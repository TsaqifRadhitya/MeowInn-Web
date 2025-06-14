<?php

namespace App\Http\Controllers;

use App\Models\detailLayanan;
use App\Models\Hewan;
use App\Models\Layanan;
use App\Models\Penitipan;
use App\Models\PetHouse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role === 'meowinn') {
            return redirect(route('meowinn.dashboard'));
        } else if ($role === 'customer') {
            return $this->user();
        } else {
            return redirect(route('pethouse.dashboard'));
        }
    }

    public function user()
    {
        return view('pages.customer.Dashboard.Index');
    }

    public function meowinn()
    {
        $layanans = Layanan::all();
        $totalPelanggan = User::where('role', 'customer')->count();
        $jumlahPethouse = PetHouse::where('verificationStatus', 'disetujui')->count();
        $jumlahPenitipanBerhangsung = Penitipan::where('status', 'selesai')->count();
        return view('pages.meowinn.Dashboard.Index', compact('layanans', 'totalPelanggan', 'jumlahPethouse', 'jumlahPenitipanBerhangsung'));

    }

    public function petHouse()
    {
        $user = Auth::user();
        $layananAktif = detailLayanan::with('layanan')->where('petHouseId', $user->id)->where('status', true)->get();
        $penitipanBerlangsung = Penitipan::where('status', 'sedang dititipkan')->where('petHouseId', $user->id)->count();
        $menujuKePethouse = Penitipan::whereIn('status', ['menunggu diantar ke pethouse', 'menunggu penjemputan'])->where('petHouseId', $user->id)->count();
        $statusPethouse = $user->petHouses?->verificationStatus;
        $totalHewanDititipkan = Hewan::whereHas('penitipan', function ($query) use ($user) {
            $query->where('petHouseId', $user->id);
        })->count();
        return view('pages.petHouse.Dashboard.Index', compact('layananAktif', 'statusPethouse', 'penitipanBerlangsung', 'menujuKePethouse', 'totalHewanDititipkan'));
    }
}
