<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\PetHouse;
use Illuminate\Http\Request;

class meowinnkelolaPethouse extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search != null) {
            $daftarPethouse = PetHouse::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                ->where('verificationStatus', 'disetujui')
                ->paginate(3);

        } else {
            $daftarPethouse = PetHouse::where('verificationStatus', 'disetujui')->paginate(2);
        }
        return view('pages.meowinn.PetHouse.meowInnPetHouse', compact('daftarPethouse'));
    }

    public function penalty()
    {
        $daftarPenalty = PetHouse::where('penalty', '>', 0)->get();
        return view('pages.meowinn.PetHouse.meowinnPetHousePenalty', compact('daftarPenalty'));
    }

    public function pengajuan()
    {
        $daftarPengajuan = PetHouse::where('verificationStatus', '=', 'menunggu persetujuan')->paginate(5);
        return view('pages.meowinn.PetHouse.meowinnPengajuanPethouse', compact('daftarPengajuan'));
    }

    public function show(Request $request, $id)
    {
        $profilePethouse = PetHouse::find($id);
        if ($profilePethouse) {
            return view('pages.meowinn.PetHouse.meowinnPethousePreview', compact('profilePethouse'));
        }
        abort(404);
    }

    public function tolak($id)
    {
        $result = PetHouse::whereId($id)->update(['verificationStatus' => 'ditolak']);
        return back()->with('success', 'Berhasil menolak pengajuan pethouse');
    }

    public function approve($id)
    {
        $result = PetHouse::whereId($id)->update(['verificationStatus' => 'disetujui']);
        return back()->with('success', 'Berhasil menyetujui pengajuan pethouse');
    }

    public function penaltyCreate($id, Request $request)
    {
        $profilePethouse = PetHouse::find($id);

        $duration = $request->input('penalty');
        if ($duration && $profilePethouse) {
            $profilePethouse->increment('penalty', $duration);
            return back()->with('success', 'Berhasl memberikan penalty');
        } else {
            abort(404);
        }
    }

    public function penaltyRemove($id)
    {
        $result = PetHouse::whereId($id)->update(['penalty' => 0]);
        return back()->with('success', 'Berhasil Menghapus Penalty');
    }
}
