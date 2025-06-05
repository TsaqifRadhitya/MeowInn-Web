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

    public function destroy($id)
    {

    }

    public function show($id)
    {

    }

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

}
