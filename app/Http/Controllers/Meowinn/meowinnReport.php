<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class meowinnreport extends Controller
{
    public function index(){
        return view('pages.meowinn.Reports.meowInnReports');
    }
}
