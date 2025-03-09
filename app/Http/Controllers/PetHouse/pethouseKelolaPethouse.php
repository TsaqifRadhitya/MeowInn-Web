<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pethouseKelolaPetHouse extends Controller
{
    public function index(){
        return view('pages.petHouse.petHouseSetting.petHousePreview');
    }

    public function setting(){
        return view('pages.petHouse.petHouseSetting.petHouseSetting');
    }
}
