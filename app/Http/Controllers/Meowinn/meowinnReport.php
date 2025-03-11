<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class meowinnreport extends Controller
{
    public function index(){
        $reports = Report::all()->where('jenis_reports','=','Admin');
        return view('pages.meowinn.Reports.meowInnReports',compact('reports'));
    }
}
