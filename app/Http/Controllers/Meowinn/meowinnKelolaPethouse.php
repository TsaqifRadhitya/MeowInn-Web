<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\PetHouse;

class meowinnkelolaPethouse extends Controller
{
    public function index(){
        return view('pages.meowinn.PetHouse.meowInnPetHouse');
    }

    public function penalty(){
        $daftarPenalty = PetHouse::where('penalty','>',0)->get();
        // dd($daftarPenalty);
        return view('pages.meowinn.PetHouse.meowinnPetHousePenalty',compact('daftarPenalty'));
    }
}
