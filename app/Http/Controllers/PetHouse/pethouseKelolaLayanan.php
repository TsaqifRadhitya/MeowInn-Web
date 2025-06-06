<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;
use App\Models\detailLayanan;
use Auth;
use Illuminate\Http\Request;

class pethousekelolaLayanan extends Controller
{
    public function index()
    {
        $layanans = detailLayanan::where('petHouseId', Auth::user()->petHouses->id)->paginate(4);
        return view('pages.petHouse.Layanan.Index', compact('layanans'));
    }

    public function destroy($id)
    {
        detailLayanan::whereId($id)->update(['status' => false]);
        return back()->with('success', 'Berhasil Menonaktifkan Layanan');
    }

    public function show($id)
    {
        $layanan = detailLayanan::find($id);
        if ($layanan) {
            return view('pages.Pethouse.Layanan.Show', compact('layanan'));
        }
        ;
        abort(404);
    }

    public function edit($id)
    {
        $layanan = detailLayanan::find($id);
        if ($layanan) {
            return view('pages.Pethouse.Layanan.Edit', compact('layanan'));
        }
        ;
        abort(404);
    }

    public function update(Request $request)
    {

    }
}
