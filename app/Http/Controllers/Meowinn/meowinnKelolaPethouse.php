<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class meowinnkelolaPethouse extends Controller
{
    public function index(){
        return view('pages.meowinn.PetHouse.meowInnPetHouse');
    }

    public function penalty(){
        return view('pages.meowinn.PetHouse.meowinnPetHousePenalty');
    }
}
