<?php

namespace App\Http\Controllers\Customer;
use App\Models\Report;

use App\Models\PetHouse;
use App\Models\Penitipan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerReports extends Controller
{
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

    public function storePethouse(Request $request, $id)
    {
        $request->validate(
            ['isi' => ['required', 'max:500', 'min:1']]
        );

        $petHouse = PetHouse::with(['user.village.district.city', 'pethouseLayanans'])->find($id);

        if ($petHouse) {
            PetHouse::create(
                ['jenis_reports' => 'Pet House', 'isi' => $request->isi, 'pethouseId' => $petHouse->id]
            );
            return back()->with('success', 'Berhasil Mengirimakan Feedback');
        }
        abort(404);
    }

    public function storePenitipan(Request $request, $id)
    {
        $request->validate(
            ['isi' => ['required', 'max:500', 'min:1']]
        );

        $penitipan = Penitipan::find($id);
        if ($penitipan) {
            Report::create(
                ['jenis_reports' => 'Pet House', 'isi' => $request->isi, 'penitipanId' => $id, 'pethouseId' => $penitipan->petHouseId]
            );
            return back()->with('success', 'Berhasil Mengirimakan Feedback');
        }
        abort(404);
    }
}
