<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\Penitipan;
use Illuminate\Http\Request;

class meowinnKelolaPenitipan extends Controller
{
    public function show($id)
    {
        $penitipan = Penitipan::with(['hewans.penitipanLayanans.pethouseLayanan', 'laporans', 'pethouse'])->find($id);
        if ($penitipan) {
            return view('pages.meowinn.Penitipan.Show', compact('penitipan'));
        }
        abort(404);
    }
}
