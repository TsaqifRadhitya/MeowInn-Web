<?php

namespace App\Http\Controllers\PetHouse;

use App\Models\Penitipan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pethouseKelolaPenitipan extends Controller
{
    public function index(Request $request)
    {
        if ($request->status && $request->status != "") {
            $penitipans = Penitipan::with('hewans.penitipanLayanans', 'users.village.district.city.province')->where('petHouseId', Auth::user()->petHouses?->id)->where('status', $request->status)->paginate(2);
        } else {
            $penitipans = Penitipan::with('hewans.penitipanLayanans', 'users.village.district.city.province')->where('petHouseId', Auth::user()->petHouses?->id)->whereNotIn('status', ['selesai', 'gagal', 'menunggu pembayaran'])->paginate(2);
        }
        return view('pages.petHouse.Penitipan.Index', compact('penitipans'));
    }
    public function show($id)
    {
        $penitipan = Penitipan::with(['hewans.penitipanLayanans.pethouseLayanan', 'laporans'])->find($id);
        if ($penitipan) {
            return view('pages.petHouse.Penitipan.Show', compact('penitipan'));
        }
        abort(404);
    }
    public function update($id)
    {
        $penitipan = Penitipan::find($id);

        if ($penitipan) {
            $currentStatus = $penitipan->status;
            if ($currentStatus === "menunggu penjemputan" || $currentStatus === "menunggu diantar ke pethouse") {
                $nextStatus = "sedang dititipkan";
            } else {
                $nextStatus = $penitipan->isPickUp === 0 || $penitipan->status === 'sedang diantar pulang' ? "selesai" : 'sedang diantar pulang';
            }
            $penitipan->update(['status' => $nextStatus]);
            return redirect()->route("pethouse.penitipan.show", $id)->with("success", "Berhasil memperbarui status penitipan");
        }

        abort(404);
    }

    public function riwayat()
    {
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('petHouseId', Auth::user()->petHouses?->id)->where('status', 'selesai')->paginate(2);
        return view('pages.petHouse.Penitipan.Riwayat', compact('penitipans'));
    }
}
