<?php

namespace App\Http\Controllers\PetHouse;

use App\Models\PetHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pethouseKelolaPethouse extends Controller
{
    public function index()
    {
        $petHouse = PetHouse::with(['user.village.district.city.province', 'pethouseLayanans.layanan'])->where('userId', Auth::user()->id)->first();
        return view('pages.petHouse.petHouseSetting.Index', compact('petHouse'));
    }

    public function edit()
    {
        $pethouse = PetHouse::with(['user.village.district.city.province'])->where('userId', Auth::user()->id)->first();
        return view('pages.petHouse.petHouseSetting.Edit', compact('pethouse'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'description' => ['required','string','min:300'],
                'isOpen' => ['nullable'],
                'petCareCost' => ['required', 'numeric', 'min:20000'],
                'pickUpService' => ['nullable', 'string'],
                'range' => ['required_if:pickUpService,on', 'in:village,district,city'],
                'locationPhotos' => ['nullable', 'array'],
                'locationPhotos*' => ['', ''],

            ],
        );
        return back()->with('success', 'Berhasil Mengubah Pengaturan Pethouse');
    }
}
