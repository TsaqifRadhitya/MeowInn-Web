<?php

namespace App\Http\Controllers;

use App\Models\PetHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerPethouse extends Controller
{

    public function index()
    {
        $petHouses = PetHouse::whereRelation('user.village.district.city.cityName', '=', Auth::user()->village->district->city->cityName)->paginate(4);
        return view('pages.customer.Pethouse.Index', compact('petHouses'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request, $id)
    {
        $request->validate(
            ['isi' => ['required', 'max:500', 'min:1']]
        );

        $petHouse = PetHouse::find($id);

        if ($petHouse) {
            PetHouse::create(
                ['jenis_reports' => 'Pet House', 'isi' => $request->isi, 'pethouseId' => $petHouse->id]
            );
            return back()->with('success', 'Berhasil Mengirimakan Feedback');
        }
        abort(404);
    }


    public function show(string $id)
    {
        $petHouse = PetHouse::with(['user', 'pethouseLayanans.layanan', 'penitipans'])->find($id);
        if ($petHouse) {
            return view('pages.customer.Pethouse.Show', compact('petHouse'));
        }
        abort(404);
    }
}
