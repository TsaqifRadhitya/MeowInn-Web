<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;

class pethousekelolaPenitipan extends Controller
{
    public function index()
    {
        return view('pages.petHouse.Penitipan.petHouseDaftarPenitipan');
    }
    public function show($id)
    {

    }
    public function update($id)
    {

    }

    public function riwayat()
    {
        return view('pages.petHouse.Penitipan.petHouseRiwayatPenitipan');
    }
}
