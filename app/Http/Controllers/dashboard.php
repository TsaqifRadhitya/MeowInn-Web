<?php

namespace App\Http\Controllers;

use App\Models\detailLayanan;
use App\Models\Hewan;
use App\Models\Layanan;
use App\Models\Penitipan;
use App\Models\PetHouse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $role = Auth::user()?->role;
        if ($role !== null && $role !== 'customer') {
            return back();
        }
        return view('pages.customer.Dashboard.index');
    }

    public function meowinn()
    {
        $layanans = Layanan::where('isdeleted', false)->get();
        $totalPelanggan = User::where('role', 'customer')->count();
        $jumlahPethouse = PetHouse::where('verificationStatus', 'disetujui')->count();
        $jumlahPenitipanBerhangsung = Penitipan::where('status', 'sedang dititipkan')->count();
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY)->endOfDay();

        $hariMinggu = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $defaultData = collect($hariMinggu)->mapWithKeys(fn($val) => [$val => 0]);

        $totalPendapatanBulanIni = Penitipan::whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURRENT_DATE())')
            ->get()
            ->sum(function ($penitipan) {
                $biayaPenitipan = $penitipan->petCareCosts * $penitipan->duration * $penitipan->hewans->count();
                $biayaLayanan = $penitipan->hewans->flatMap->penitipanLayanans->sum('price');
                return $biayaPenitipan + $biayaLayanan;
            });

        $penitipanCash = Penitipan::with(['hewans.penitipanLayanans'])
            ->where('isCash', true)
            ->whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        $penitipanNonCash = Penitipan::with(['hewans.penitipanLayanans'])
            ->where('isCash', false)
            ->whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        $hitungPendapatanPerHari = function ($penitipans) use ($hariMinggu) {
            $result = [];

            foreach ($penitipans as $penitipan) {
                $hariEn = $penitipan->created_at->format('l');
                $hari = $hariMinggu[$hariEn] ?? $hariEn;

                $jumlahHewan = count($penitipan->hewans);
                $biayaPenitipan = $penitipan->petCareCosts * $penitipan->duration * $jumlahHewan;

                $biayaLayanan = 0;
                foreach ($penitipan->hewans as $hewan) {
                    foreach ($hewan->penitipanLayanans as $layanan) {
                        $biayaLayanan += $layanan->price ?? 0;
                    }
                }

                $total = $biayaPenitipan + $biayaLayanan;

                if (!isset($result[$hari])) {
                    $result[$hari] = 0;
                }
                $result[$hari] += $total;
            }

            return collect($hariMinggu)->mapWithKeys(fn($val) => [$val => $result[$val] ?? 0]);
        };

        $transaksiMingguanCash = $hitungPendapatanPerHari($penitipanCash);
        $transaksiMingguanNonCash = $hitungPendapatanPerHari($penitipanNonCash);

        $pendapatan = [
            'cash' => array_values($transaksiMingguanCash->toArray()),
            'nonCash' => array_values($transaksiMingguanNonCash->toArray()),
        ];

        return view('pages.meowinn.Dashboard.Index', compact(
            'layanans',
            'totalPelanggan',
            'jumlahPethouse',
            'jumlahPenitipanBerhangsung',
            'pendapatan',
            'totalPendapatanBulanIni'
        ));
    }

    public function petHouse()
    {
        $user = Auth::user();

        $layananAktif = detailLayanan::with('layanan')->where('petHouseId', $user->petHouses?->id)->where('status', true)->get();

        $penitipanBerlangsung = Penitipan::where('status', 'sedang dititipkan')->where('petHouseId', $user->id)->count();

        $menujuKePethouse = Penitipan::whereIn('status', ['menunggu diantar ke pethouse', 'menunggu penjemputan'])->where('petHouseId', $user->id)->count();

        $statusPethouse = $user->petHouses?->verificationStatus;

        $totalHewanDititipkan = Hewan::whereHas('penitipan', function ($query) use ($user) {
            $query->where('petHouseId', $user->id);
        })->whereRelation('penitipan', 'status', 'sedang dititipkan')->count();

        $totalPendapatanBulanIni = Penitipan::whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')->where('petHouseId', $user->petHouses?->id)
            ->whereRaw('YEAR(created_at) = YEAR(CURRENT_DATE())')
            ->get()
            ->sum(function ($penitipan) {
                $biayaPenitipan = $penitipan->petCareCosts * $penitipan->duration * $penitipan->hewans->count();
                $biayaLayanan = $penitipan->hewans->flatMap->penitipanLayanans->sum('price');
                return $biayaPenitipan + $biayaLayanan;
            });



        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY)->endOfDay();

        $hariMinggu = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $defaultData = collect($hariMinggu)->mapWithKeys(fn($val) => [$val => 0]);

        $penitipanCash = Penitipan::with(['hewans.penitipanLayanans'])
            ->where('isCash', true)->where('petHouseId', $user->petHouses?->id)
            ->whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        $penitipanNonCash = Penitipan::with(['hewans.penitipanLayanans'])
            ->where('isCash', false)->where('petHouseId', $user->petHouses?->id)
            ->whereNotIn('status', ['gagal', 'menunggu pembayaran'])
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        $hitungPendapatanPerHari = function ($penitipans) use ($hariMinggu) {
            $result = [];

            foreach ($penitipans as $penitipan) {
                $hariEn = $penitipan->created_at->format('l');
                $hari = $hariMinggu[$hariEn] ?? $hariEn;

                $jumlahHewan = count($penitipan->hewans);
                $biayaPenitipan = $penitipan->petCareCosts * $penitipan->duration * $jumlahHewan;

                $biayaLayanan = 0;
                foreach ($penitipan->hewans as $hewan) {
                    foreach ($hewan->penitipanLayanans as $layanan) {
                        $biayaLayanan += $layanan->price ?? 0;
                    }
                }

                $total = $biayaPenitipan + $biayaLayanan;

                if (!isset($result[$hari])) {
                    $result[$hari] = 0;
                }
                $result[$hari] += $total;
            }

            return collect($hariMinggu)->mapWithKeys(fn($val) => [$val => $result[$val] ?? 0]);
        };

        $transaksiMingguanCash = $hitungPendapatanPerHari($penitipanCash);
        $transaksiMingguanNonCash = $hitungPendapatanPerHari($penitipanNonCash);

        $pendapatan = [
            'cash' => array_values($transaksiMingguanCash->toArray()),
            'nonCash' => array_values($transaksiMingguanNonCash->toArray()),
        ];
        return view('pages.petHouse.Dashboard.Index', compact('layananAktif', 'statusPethouse', 'penitipanBerlangsung', 'menujuKePethouse', 'totalHewanDititipkan', 'pendapatan','totalPendapatanBulanIni'));
    }
}
