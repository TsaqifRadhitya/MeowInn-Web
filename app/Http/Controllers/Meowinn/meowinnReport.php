<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class meowinnreport extends Controller
{
    public function index()
    {
        $reports = Report::with(['petHouse', 'penitipan'])->where('jenis_reports', 'Admin')->paginate(12);
        return view('pages.meowinn.Reports.meowInnReports', compact('reports'));
    }
}
