<?php

namespace App\Http\Controllers\Customer;

use App\HasCloudinary;
use App\Models\DetaiLayananPenitipan;
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
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('userId', Auth::user()->id)->whereNotIn('status', ['selesai', 'gagal'])->paginate(4);
        return view('pages.customer.Penitipan.Index', compact('penitipans'));
    }

    public function riwayat()
    {
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('userId', Auth::user()->id)->whereIn('status', ['selesai', 'gagal'])->paginate(4);
        return view('pages.customer.Penitipan.Riwayat', compact('penitipans'));
    }

    public function show($id)
    {
        $penitipan = Penitipan::with(['hewans.penitipanLayanans.Layanan', 'laporans'])->find($id);
        if ($penitipan) {
            return view('pages.customer.Penitipan.Show', compact('penitipans'));
        }
        abort(404);
    }

    public function create($id)
    {
        $pethouse = PetHouse::with(['user.village.district.city.province', 'pethouseLayanans.layanan'])->find($id);
        if ($pethouse) {
            return view('pages.customer.Penitipan.Create');
        }
        abort(404);
    }

    public function store($id)
    {

    }

    public function report(Request $request, $id)
    {
        $request->validate(
            ['isi' => ['required', 'max:500', 'min:1']]
        );

        $penitipan = Penitipan::find($id);
        if ($penitipan) {
            Report::create(
                ['jenis_reports' => 'Pet House', 'isi' => $request->isi, 'penitipanId' => $id, 'pethouseId' => $penitipan->petHouseId]
            );
            return back()->with('success', 'Berhasil Mengirimakan Feedback');
        }
        abort(404);
    }

    public function update($id)
    {

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
