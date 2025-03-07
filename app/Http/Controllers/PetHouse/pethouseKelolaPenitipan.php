<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;

class pethousekelolaPenitipan extends Controller
{
    public function daftarPenitipan()
    {
        return view('pages.petHouse.Penitipan.petHouseDaftarPenitipan');
    }

    public function daftarReports($id)
    {
        return view('pages.petHouse.Penitipan.petHouseDaftarReportPenitipan');
    }

    public function detailReports($id)
    {
        return view('pages.petHouse.Penitipan.petHouseDetailReportPenitipan');
    }

    public function riwayatPenitipan(){
        return view('pages.petHouse.Penitipan.petHouseRiwayatPenitipan');
    }
}
