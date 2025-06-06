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

    }

    public function riwayat()
    {
        $penitipans = Penitipan::with('hewans.penitipanLayanans.Layanan')->where('petHouseId', Auth::user()->petHouses->id)->whereIn('status', ['selesai', 'gagal'])->paginate(4);
        return view('pages.petHouse.Penitipan.Riwayat', compact('penitipans'));
    }
}
