<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class meowinnkelolaLayanan extends Controller
{
    public function index()
    {
        $daftarLayanan = Layanan::where('isdeleted', '==', 1)->orderBy('id', 'asc')->get();
        return view('pages.meowinn.Layanan.meowInnLayanan', compact('daftarLayanan'));
    }

    public function pengajuanLayanan()
    {
        return view('pages.meowinn.Layanan.meowinnPengajuanLayanan');
    }

    public function delete($id) {
        Layanan::destroy($id);
        return response(null,200);
    }

    public function edit(Request $request, $id)
    {
        $request->validate(['nama_layanan' => ['required', 'string'], 'persetujuan' => ['required']]);
        // dd($validate);
        Layanan::whereId($id)->update([
            'nama_layanan' => $request->input('nama_layanan'),
            'persetujuan' =>  $request->input('persetujuan') == 'on' ? true : false
        ]);

        return back()->with('message', 'Berhasil Mengubah Layanan' . $request->input('nama_layanan'));
    }

    public function create(Request $request)
    {
        // dd($request->input());
        $request->validate(['nama_layanan' => ['required', 'string'], 'persetujuan' => ['required']]);
        // dd($validate);
        Layanan::create([
            'nama_layanan' => $request->input('nama_layanan'),
            'persetujuan' =>  $request->input('nama_layanan') == 'on' ? true : false
        ]);
        return back()->with('message', 'Berhasil Menambahkan Layanan');
    }
}
