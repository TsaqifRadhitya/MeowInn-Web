<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pethousekelolaLayanan extends Controller
{
    public function index()
    {
        return view('pages.petHouse.Layanan.petHouseDaftarLayanan');
    }
}
