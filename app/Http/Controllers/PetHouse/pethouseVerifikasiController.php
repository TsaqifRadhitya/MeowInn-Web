<?php

namespace App\Http\Controllers\PetHouse;
use App\HasCloudinary;
use App\Models\city;
use App\Models\district;
use App\Models\PetHouse;
use App\Models\province;
use App\Models\User;
use App\Models\villages;
use \Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pethouseVerifikasiController extends Controller
{
    use HasCloudinary;
    public function index()
    {
        $user = User::with(['petHouses', 'village.district.city.province'])->find(Auth::user()->id);
        return view("pages.petHouse.Pengajuan.index", compact("user"));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $pethouse = $user->petHouses;
        $validated = $request->validate([
            'phoneNumber' => ['required', 'alpha_num', 'unique:users,phoneNumber,' . $user->id . ',id', 'min:12'],
            'address' => ['required'],
            'village' => ['required'],
            'district' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'name' => ['required', 'string', 'unique:pet_houses,name,' . $pethouse?->id . ',id'],
            'petCareCost' => ['required', 'numeric', 'min:20000'],
            'locationPhotos' => ['required', 'array'],
            'locationPhotos.*' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'pickUpService' => ['nullable'],
            'range' => ['required_if:pickUpService,on', 'in:village,district,district'],
            'description' => ['required', 'string', 'max:300'],
            'profilePicture' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $validated['profilePicture'] = $this->cloudinarySingleUpload($request->file('profilePicture'), 'profile/' . $user->email);
        $validated['locationPhotos'] = json_encode($this->cloudinaryBatchUpload($request->file('locationPhotos'), 'pethouse/' . $user->email));
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

        $userData = [
            'phoneNumber' => $validated['phoneNumber'],
            'address' => $validated['address'],
            'profilePicture' => $validated['profilePicture'],
            'villageId' => $validated['villageId'],
            'verificationStatus' => 'menunggu persetujuan'
        ];


        $user->update($userData);

        if ($request->pickUpService === "on") {
            $petHouseData['range'] = $validated['range'];
            $validated['pickUpService'] = true;
        } else {
            $validated['pickUpService'] = false;
            $validated['range'] = null;
        }

        $petHouseData = [
            'name' => $validated['name'],
            'petCareCost' => $validated['petCareCost'],
            'locationPhotos' => $validated['locationPhotos'],
            'description' => $validated['description'],
            'pickUpService' => $validated['pickUpService'],
            'isOpen' => false,
            'verificationStatus' => 'menunggu persetujuan'
        ];
        if ($pethouse) {
            $pethouse->update($petHouseData);
        } else {
            $user->petHouses()->create($petHouseData);
        }
        return redirect()->route('pethouse.verifikasi.index')->with('success', 'Berhasil Mengirimkan Pengajuan Verifikasi Pethouse');
    }

    public function create()
    {
        $user = User::with(['petHouses', "village.district.city.province"])->find(Auth::user()->id);
        return view("pages.petHouse.Pengajuan.create", compact("user"));
    }
}
