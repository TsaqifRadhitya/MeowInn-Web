<?php

namespace App\Http\Controllers\Customer;

use App\HasCloudinary;
use App\Models\DetaiLayananPenitipan;
use App\Models\detailLayanan;
use App\Models\Hewan;
use App\Models\Penitipan;
use App\Models\PetHouse;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Midtrans\Config;
use Midtrans\Snap;

class customerPenitipan extends Controller
{
    use HasCloudinary;
    public function index()
    {
        $penitipans = Penitipan::with(['hewans.penitipanLayanans.pethouseLayanan.layanan', 'pethouse.user.village.district.city.province'])->where('userId', Auth::user()->id)->orderByDesc('created_at')->paginate(4);
        return view('pages.customer.Penitipan.Index', compact('penitipans'));
    }

    public function show($id)
    {
        $penitipan = Penitipan::with(['hewans.penitipanLayanans.pethouseLayanan.layanan', 'laporans'])->find($id);
        if ($penitipan) {
            return view('pages.customer.Penitipan.Show', compact('penitipan'));
        }
        abort(404);
    }

    public function create($id)
    {
        $pethouse = PetHouse::with([
            'user.village.district.city.province',
            'pethouseLayanans' => function ($q) {
                $q->where('status', 1)->with('layanan');
            }
        ])->find($id);
        if ($pethouse) {
            $user = Auth::user();
            if ($pethouse->pickUpService) {
                switch ($pethouse->range) {
                    case 'village':
                        $pickupServiceStatus = $pethouse->user->villageId === $user->villageId;
                        break;
                    case 'district':
                        $pickupServiceStatus = $pethouse->user->village->districtId === $user->village->districtId;
                        break;
                    case 'city':
                        $pickupServiceStatus = $pethouse->user->village->district->cityId === $user->village->district->cityId;
                        break;
                }
            } else {
                $pickupServiceStatus = false;
            }
            return view('pages.customer.Penitipan.Create', compact('pethouse', 'pickupServiceStatus'));
        }
        abort(404);
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'duration' => ['required', 'min:1', 'numeric'],
            'petCareCosts' => ['required', 'numeric'],
            'isCash' => ['required'],
            'isPickUp' => ['nullable'],
        ]);

        $user = Auth::user();
        $validated['status'] = $request->isPickUp && $request->isCash ? 'menunggu penjemputan' : 'menunggu pembayaran';
        if ($request->isPickUp && $request->isCash) {
            $validated['status'] = 'menunggu penjemputan';
        } else if ($request->isCash) {
            $validated['status'] = 'menunggu diantar ke pethouse';
        } else {
            $validated['status'] = 'menunggu pembayaran';
        }
        $validated['isCash'] = $request->isCash ? true : false;
        $validated['address'] = $user->address;
        $validated['villageId'] = $user->villageId;
        $validated['userId'] = $user->id;
        $validated['petHouseId'] = $id;

        $penitipan = Penitipan::create($validated);
        if (!$penitipan->isCash) {
            Config::$serverKey = config('app.midtrans.server_key');
            Config::$isProduction = config('app.midtrans.is_production');
            Config::$isSanitized = config('app.midtrans.is_sanitized');
            Config::$is3ds = config('app.midtrans.is_3ds');
            $ress = Snap::createTransaction([
                "transaction_details" => [
                    "order_id" => $penitipan->id,
                    "gross_amount" => $request->total
                ],
                "callbacks" => [
                    "finish" => route('customer.penitipan.show', ["id" => $penitipan->id]),
                    "error" => route('customer.penitipan.show', ["id" => $penitipan->id])
                ],
            ]);
            $penitipan->update(['snapToken' => $ress->token]);
        }
        if ($request->has('cats')) {
            $cats = $request->cats;
            $catFiles = $request->file('cats');
            foreach ($cats as $i => $cat) {
                $file = $catFiles[$i]['foto'];
                $foto = $this->cloudinarySingleUpload($file, $cat['nama']);
                $hewan = Hewan::create([
                    'foto' => $foto,
                    'name' => $cat['nama'],
                    'description' => $cat['description'],
                    'penitipanId' => $penitipan->id,
                ]);
                if (isset($cat['layanans'])) {
                    foreach ($cat['layanans'] as $layananId) {
                        $detailLayanan = detailLayanan::find($layananId);
                        DetaiLayananPenitipan::create([
                            'price' => $detailLayanan->price,
                            'detailLayananId' => $layananId,
                            'hewanId' => $hewan->id,
                        ]);
                    }
                }
            }
        }
        return redirect()->route('customer.penitipan.show', $penitipan->id)->with('success', 'Penitipan berhasil disimpan!');
    }

    public function destroy($id)
    {
        $penitipan = Penitipan::find($id);
        if ($penitipan) {
            if ($penitipan->status === "menunggu pembayaran") {
                Penitipan::destroy($id);
                return back()->with("success", "Berhasil Membatalkan Penitipan");
            }

            return back()->with("error", "Tidak Dapat Membatalkan Penitipan");
        }

        abort(404);
    }
}
