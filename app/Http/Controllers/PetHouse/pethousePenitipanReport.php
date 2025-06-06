<?php

namespace App\Http\Controllers;

use App\Models\laporanPenitipan;
use App\Models\Report;
use Illuminate\Http\Request;

class pethousePenitipanReport extends Controller
{
    public function create()
    {

    }
    public function store(Request $request)
    {

    }
    public function edit()
    {

    }
    public function update(Request $request, $penitipanId, $reportId)
    {

    }
    public function destroy($penitipanId, $reportId)
    {
        $deletedAmount = laporanPenitipan::where('id', $reportId)->where('penitipanId', $penitipanId)->delete();

        if ($deletedAmount > 0) {
            return back()->with('success', 'Berhasil Menghapus Laporan Penitipan');
        }
        abort(404);
    }
}
