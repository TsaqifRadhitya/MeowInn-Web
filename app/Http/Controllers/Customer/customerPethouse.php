<?php

namespace App\Http\Controllers\Customer;

use App\Models\PetHouse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class customerPethouse extends Controller
{

    public function index()
    {
        $petHouses = PetHouse::whereNot('penalty', '>', 0)->where('isOpen',true)->whereRelation('user.village.district.city', 'cityName', '=', Auth::user()->village?->district?->city?->cityName)->paginate(4);
        return view('pages.customer.Pethouse.Index', compact('petHouses'));
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
