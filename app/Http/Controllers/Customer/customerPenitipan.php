<?php

namespace App\Http\Controllers\Customer;

use App\HasCloudinary;
use App\Models\DetaiLayananPenitipan;
use App\Models\Hewan;
use App\Models\Penitipan;
use App\Models\PetHouse;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerPenitipan extends Controller
{
    use HasCloudinary;
    public function index()
    {
        $penitipans = Penitipan::with(['hewans.penitipanLayanans.pethouseLayanan.layanan', 'pethouse.user.village.district.city.province'])->where('userId', Auth::user()->id)->paginate(10);
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
            return view('pages.customer.Penitipan.Create', compact('pethouse'));
        }
        abort(404);
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'duration' => ['required', 'min:1', 'numeric'],
            'petCareCosts' => ['required', 'numeric'],
            'isCash' => ['required', 'boolean'],
            'isPickUp' => ['required', 'boolean'],
        ]);
        $user = Auth::user();
        $validated['status'] = $validated['isPickUp'] ? 'menunggu penjemputan' : 'menunggu pembayaran';
        $validated['address'] = $user->address;
        $validated['villageId'] = $user->villageId;
        $validated['userId'] = $user->id;
        $validated['petHouseId'] = $id;
        dd($request->all());
        $penitipan = Penitipan::create($validated);
        if ($request->has('cats')) {
            $cats = $request->input('cats');
            $catFiles = $request->file('cats');
            foreach ($cats as $i => $cat) {
                if (is_object($cat))
                    $cat = (array) $cat;
                $foto = null;
                if (isset($catFiles[$i]['foto']) && $catFiles[$i]['foto']->isValid()) {
                    $file = $catFiles[$i]['foto'];
                    $filename = 'kucing/' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/kucing'), $filename);
                    $foto = 'kucing/' . basename($filename);
                } else {
                    $foto = 'kucing/default.png';
                }
                // $hewan = Hewan::create([
                //     'foto' =>
                // ])
                $hewan = Hewan([
                    'name' => isset($cat['nama']) ? $cat['nama'] : (isset($cat['name']) ? $cat['name'] : 'Tanpa Nama'),
                    'foto' => $foto,
                    'description' => $cat['jenis'] ?? null,
                    'penitipanId' => $penitipan->id,
                    'petCareCost' => $penitipan->petCareCosts,
                ]);
                $hewan->save();
                if (!empty($cat['layanans'])) {
                    foreach ($cat['layanans'] as $layananId) {
                        $detailLayanan = $detailLayanan::find($layananId);
                        $hargaLayanan = $detailLayanan ? $detailLayanan->price : 0;
                        DetaiLayananPenitipan::create([
                            'price' => $hargaLayanan,
                            'detailLayananId' => $layananId,
                            'hewanId' => $hewan->id,
                        ]);
                    }
                }
            }
        }
        return redirect()->route('customer.penitipan.index')->with('success', 'Penitipan berhasil disimpan!');
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
