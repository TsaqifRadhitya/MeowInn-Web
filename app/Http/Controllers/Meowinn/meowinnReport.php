<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class meowinnReport extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('type')) {
            switch ($request->type) {
                case 'admin':
                    $reports = Report::where('jenis_reports', 'Admin')->orderBy('created_at', 'desc')->paginate(perPage: 3);
                    break;
                case 'pethouse':
                    $reports = Report::whereNotNull('pethouseId')->orderBy('created_at', 'desc')->paginate(perPage: 3);
                    break;
                case 'penitipan':
                    $reports = Report::whereNotNull('penitipanId')->orderBy('created_at', 'desc')->paginate(3);
                    break;
            }
        } else {
            $reports = Report::orderBy('created_at', 'desc')->paginate(perPage: 3);
        }
        return view('pages.meowinn.Reports.Index', compact('reports'));
    }
}
