<?php

namespace App\Http\Controllers\PetHouse;

use App\Models\city;
use App\Models\User;
use App\HasCloudinary;
use App\Models\district;
use App\Models\province;
use App\Models\villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class pethouseProfile extends Controller
{
    public function index()
    {
        $user = User::with("village.district.city.province")->find(Auth::user()->id);
        return view('pages.petHouse.Profile.Index', compact('user'));
    }
}
