<?php

namespace App\Http\Controllers\Meowinn;
use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\User;
use App\HasCloudinary;
use App\Models\district;
use App\Models\province;
use App\Models\villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileAdminController extends Controller
{
    use HasCloudinary;
    public function index()
    {
        $user = User::with("village.district.city.province")->find(Auth::user()->id);
        return view('pages.meowinn.Profile.Index', compact('user'));
    }
    public function edit()
    {
        $user = User::with("village.district.city.province")->find(Auth::user()->id);
        return view('pages.meowinn.Profile.Edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'province' => ['required'],
            'city' => ['required'],
            'name' => ['required', 'string'],
            'district' => ['required'],
            'village' => ['required'],
            'phoneNumber' => ['required', 'unique:users,phoneNumber,' . $user->id . ',id', 'min:12'],
            'address' => ['required'],
            'profilePicture' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('profilePicture')) {
            $validated['profilePicture'] = $this->cloudinarySingleUpload($request->file('profilePicture'), 'profile/' . $user->email);
        }

        $provinceInput = json_decode($validated['province']);
        $cityInput = json_decode($validated['city']);
        $districtInput = json_decode($validated['district']);
        $villageInput = json_decode($validated['village']);
        $province = province::firstOrNew(
            ['id' => $provinceInput->id],
            ['provinceName' => $provinceInput->name]
        );
        $province->save();
        $city = city::firstOrNew(
            ['id' => $cityInput->id],
            ['cityName' => $cityInput->name, 'proviceId' => $province->id]
        );
        $city->save();
        $district = district::firstOrNew(
            ['id' => $districtInput->id],
            ['districtName' => $districtInput->name, 'cityId' => $city->id]
        );
        $district->save();

        $village = villages::firstOrNew(
            ['id' => $villageInput->id],
            ['villageName' => $villageInput->name, 'districtId' => $district->id]
        );

        $village->save();

        $validated['villageId'] = $village->id;
        $user->update($validated);

        return redirect()->route('meowinn.profile.index')->with('success', 'Berhasil Memperbarui Profile');
    }
}
