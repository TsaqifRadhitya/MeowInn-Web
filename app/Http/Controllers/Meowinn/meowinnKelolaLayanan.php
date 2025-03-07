<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class meowinnkelolaLayanan extends Controller
{
    public function index(){
        return view('pages.meowinn.Layanan.meowInnLayanan');
    }

    public function pengajuanLayanan(){
        return view('pages.meowinn.Layanan.meowinnPengajuanLayanan');
    }
}
