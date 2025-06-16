<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\PetHouse;
use Illuminate\Http\Request;

class meowinnKelolaPethouse extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search != null) {
            $daftarPethouse = PetHouse::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                ->where('verificationStatus', 'disetujui')
                ->paginate(3);

        } else {
            $daftarPethouse = PetHouse::where('verificationStatus', 'disetujui')->paginate(3);
        }
        return view('pages.meowinn.PetHouse.Index', compact('daftarPethouse'));
    }

    public function penalty()
    {
        $daftarPenalty = PetHouse::where('penalty', '>', 0)->paginate(5);
        return view('pages.meowinn.PetHouse.Penalty', compact('daftarPenalty'));
    }

    public function pengajuan()
    {
        $daftarPengajuan = PetHouse::where('verificationStatus', '=', 'menunggu persetujuan')->paginate(5);
        return view('pages.meowinn.PetHouse.Pengajuan', compact('daftarPengajuan'));
    }

    public function detailPengajuan($id)
    {

        $pethouse = PetHouse::find($id);
        if ($pethouse) {
            return view('pages.meowinn.PetHouse.DetailPengajuan', compact('pethouse'));
        }
        abort(404);
    }

    public function show(Request $request, $id)
    {
        $profilePethouse = PetHouse::find($id);
        if ($profilePethouse?->verificationStatus === 'disetujui') {
            return view('pages.meowinn.PetHouse.Show', compact('profilePethouse'));
        }
        if ($profilePethouse) {
            return redirect()->route('meowinn.pengajuanpethouse.show', ['id' => $id]);
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
            return back()->with('success', 'Berhasl memberikan penalty selama'.$duration.' hari');
        } else {
            abort(404);
        }
    }

    public function penaltyRemove($id)
    {
        $result = PetHouse::whereId($id)->update(['penalty' => 0]);
        return back()->with('success', 'Berhasil menghapus penalty');
    }
}
