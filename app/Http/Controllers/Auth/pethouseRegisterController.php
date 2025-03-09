<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pethouseRegisterController extends Controller
{
    public function index(){
        return view('auth.registerPetHouse');
    }

    public function store(Request $request){
        dd($request->all());
    }
}
