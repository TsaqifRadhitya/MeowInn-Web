<?php

namespace App\Http\Controllers\PetHouse;

use App\Models\Penitipan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class pethousekelolaPenitipan extends Controller
{
    public function index()
    {
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('petHouseId', Auth::user()->petHouses->id)->whereNotIn('status', ['selesai', 'gagal'])->paginate(4);
        return view('pages.petHouse.Penitipan.Index', compact('penitipans'));
    }
    public function show($id)
    {
        $penitipan = Penitipan::with(['hewans.penitipanLayanans.Layanan', 'laporans'])->find($id);
        if ($penitipan) {
            return view('pages.Pethouse.Penitipan.Show', compact('penitipans'));
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
                $nextStatus = "selesai";
            }
            $penitipan->status = $nextStatus;
            $penitipan->save();
            return redirect()->route("pethouse.penitipan.show", $id)->with("success", "Berhasil Memperbarui Status Penitipan");
        }

        abort(404);
    }

    public function riwayat()
    {
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('petHouseId', Auth::user()->petHouses->id)->whereIn('status', ['selesai', 'gagal'])->paginate(4);
        return view('pages.petHouse.Penitipan.Riwayat', compact('penitipans'));
    }
}
