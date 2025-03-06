<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class meowinnkelolaPethouse extends Controller
{
    public function index(){
        return view('meowinn.PetHouse.petHouseMeowInn');
    }
}
