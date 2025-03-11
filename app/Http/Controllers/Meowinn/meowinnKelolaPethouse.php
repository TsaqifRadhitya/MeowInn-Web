<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\PetHouse;
use Illuminate\Support\Facades\Request;

class meowinnkelolaPethouse extends Controller
{
    public function index()
    {
        return view('pages.meowinn.PetHouse.meowInnPetHouse');
    }

    public function penalty()
    {
        $daftarPenalty = PetHouse::where('penalty', '>', 0)->get();
        // dd($daftarPenalty);
        return view('pages.meowinn.PetHouse.meowinnPetHousePenalty', compact('daftarPenalty'));
    }

    public function pengajuan()
    {
        $daftarPengajuan = PetHouse::where('status_verifikasi', '=', 'menunggu persetujuan')->get();
        return view('pages.meowinn.PetHouse.meowinnPengajuanPethouse', compact('daftarPengajuan'));
    }

    public function viewDetail($id)
    {
        PetHouse::find($id, '*');
        return view('pages.meowinn.PetHouse.meowinnPethousePreview');
    }

    public function tolak($id)
    {
        $result =  PetHouse::whereId($id)->update(['status_verifikasi' => 'ditolak']);
        return response('Berhasil Penolak Pengajuan Pet House');
    }

    public function approve($id)
    {
        $result =  PetHouse::whereId($id)->update(['status_verifikasi' => 'disetujui']);
        return response('Berhasil Menyetujui Pengajuan Pet House');
    }

    public function penaltyCreate($id,Request $request) {
        $duration = $request->input('penalty');
        if($duration){
            PetHouse::whereId($id)->update(['penalty' => $duration]);
        }else{

        }
    }

    public function penaltyRemove($id)
    {
        $result =  PetHouse::whereId($id)->update(['penalty' => 0]);
        return response('Berhasil Melepas Penalty');
    }
}
