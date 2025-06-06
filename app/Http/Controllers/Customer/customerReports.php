<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use App\Models\Report;
use Illuminate\Http\Request;

class customerReports extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate(
            ['isi' => ['required', 'max:500', 'min:1']]
        );

        Report::create(
            ['jenis_reports' => 'Admin', 'isi' => $request->isi]
        );

        return back()->with('success', 'Berhasil Mengirimakan Feedback');
    }
}
