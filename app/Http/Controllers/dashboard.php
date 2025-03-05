<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index(){
        $role = Auth::user()->role;
        if($role === 'meowinn'){
            return $this->admin();
        }else if($role === 'customer'){
            return $this->user();
        }else{
            return $this->petHouse();
        }
    }

    private function user(){
        return view('');
    }

    private function admin(){
        return view('meowinn.Dashboard.meowinnDashboard');

    }

    private function petHouse(){
        return view('');
    }
}
