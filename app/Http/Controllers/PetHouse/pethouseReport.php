<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;

class pethouseReport extends Controller
{
    public function index()
    {
        return view('pages.petHouse.Reports.petHouseDaftarReport');
    }
}
