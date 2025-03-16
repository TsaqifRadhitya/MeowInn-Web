<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\detailLayanan;
use App\Models\Layanan;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class meowinnkelolaLayanan extends Controller
{
    public function index()
    {
        $daftarLayanan = Layanan::where('isdeleted', '=', 0)->orderBy('id', 'asc')->get();
        return view('pages.meowinn.Layanan.meowInnLayanan', compact('daftarLayanan'));
    }

    public function pengajuanLayanan()
    {
        $daftarPengajuanLayanan = detailLayanan::where('status_pengajuan', '=', 'Menunggu Persetujuan')->get();
        return view('pages.meowinn.Layanan.meowinnPengajuanLayanan', compact('daftarPengajuanLayanan'));
    }

    public function delete($id)
    {
        Layanan::whereId($id)->update(['isdeleted' => true]);
        return response(null, 200);
    }

    public function edit(Request $request, $id)
    {
        $request->validate(['nama_layanan' => ['required', 'string']]);
        Layanan::whereId($id)->update([
            'nama_layanan' => $request->input('nama_layanan'),
            'persetujuan' =>  $request->input('persetujuan') == 'on' ? true : false
        ]);

        return response("Berhasil Mengubah Layanan $request->input('nama_layanan')", 200);
    }

    public function create(Request $request)
    {
        $request->validate(['nama_layanan' => ['required', 'string']]);
        try {
            Layanan::create([
                'nama_layanan' => $request->input('nama_layanan'),
                'persetujuan' =>  $request->input('persetujuan') == 'on' ? true : false
            ]);
            return response(['message' => 'Berhasil Menambahkan Layanan'], 200);
        } catch (Throwable $e) {
            $resultUpdateIfExist = Layanan::whereRaw('BINARY nama_layanan = ?', [$request->input('nama_layanan')])
                ->where('persetujuan', '=', $request->input('persetujuan') == 'on' ? true : false)->where('isdeleted', '=', true)->update(['isdeleted' => false]);
            if ($resultUpdateIfExist) {
                return response(['message' => 'Berhasil Menambahkan Layanan'], 200);
            } else {
                return response(['message' => 'Layanan Sudah Tersedia'], 400);
            }
        }
    }

    public function tolakPengajuan($id)
    {
        detailLayanan::whereId($id)->update(['status_pengajuan' => 'ditolak']);
        return response('Berhasil Menolak Pengajuan Layanan', 200);
    }

    public function terimaPengajuan($id)
    {
        detailLayanan::whereId($id)->update(['status_pengajuan' => 'Disetujui']);
        return response(['message' => 'Berhasil Menyetujui Pengajuan Layanan'], 200);
    }
}
