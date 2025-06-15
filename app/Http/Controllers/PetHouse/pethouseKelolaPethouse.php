<?php

namespace App\Http\Controllers\PetHouse;

use App\HasCloudinary;
use App\Models\PetHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pethouseKelolaPethouse extends Controller
{
    use HasCloudinary;
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
                'description' => ['required', 'string', 'max:300'],
                'isOpen' => ['nullable'],
                'petCareCost' => ['required', 'numeric', 'min:20000'],
                'pickUpService' => ['nullable', 'string',],
                'range' => ['required_if:pickUpService,on', 'in:village,district,city'],
                'locationPhotos' => ['nullable', 'array'],
                'locationPhotos*' => ['file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'profilePicture' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'phoneNumber' => ['required', 'unique:users,phoneNumber,' . Auth::user()->id . ',id', 'min:12',]
            ],
        );
        $user = Auth::user();
        $validated['isOpen'] = $request->isOpen ? true : false;
        $userPayloadData = ['phoneNumber' => $validated['phoneNumber']];
        if ($request->pickUpService) {
            $validated['pickUpService'] = true;
        } else {
            $validated['pickUpService'] = false;
            $validated['range'] = null;
        }
        if ($request->hasFile('profilePicture')) {
            unset($validated['profilePicture']);
            $userPayloadData['profilePicture'] = $this->cloudinarySingleUpload($request->file('profilePicture'), 'profile/' . $user->email);
        }
        if ($request->hasFile('locationPhotos')) {
            $validated['locationPhotos'] = json_encode($this->cloudinaryBatchUpload($request->file('locationPhotos'), 'pethouse/' . $user->email));
        }

        $user->update($userPayloadData);
        unset($validated['phoneNumber']);
        $user->petHouses()->update($validated);
        return back()->with('success', 'Berhasil mengubah pengaturan pethouse');
    }
}
