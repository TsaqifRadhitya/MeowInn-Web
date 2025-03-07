<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index(){
        $role = Auth::user()->role;
        if($role === 'meowinn'){
            return redirect(route('meowinn.dashboard'));
        }else if($role === 'customer'){
            return $this->user();
        }else{
            return redirect(route('pethouse.dashboard'));
        }
    }

    public function user(){
        return view('');
    }

    public function meowinn(){
        return view('pages.meowinn.Dashboard.meowinnDashboard');

    }

    public function petHouse(){
        return view('');
    }
}
