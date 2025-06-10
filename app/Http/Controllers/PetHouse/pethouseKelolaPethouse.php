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
        $petHouse = PetHouse::with(['user.village.district.city.province'])->where('userId', Auth::user()->id)->first();
        return view('pages.petHouse.petHouseSetting.Edit', compact('petHouse'));
    }

    public function update(Request $request)
    {

        $file = $request->file('foto');

        // Generate unique filename
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Simpan ke S3
        $path = $file->storeAs('Image', $file->getClientOriginalName());
        Storage::setVisibility($path, 'public');
        dd(Storage::url($path));
        // dd($path);
        // Ambil URL file dari S3
        // Storage::setVisibility($path, 'public');
        // $url = Storage::url($path);

        // dd($url);

        // Generate URL untuk mengakses file
        // $url = Storage::url($filePath);
        // dd($url);
        // $content = $request->file('foto');
        // $fileName = time() . '_' . $content->getClientOriginalName();
        // $filePath = "Image/{$fileName}";
        // $result =  Storage::disk('s3')->put($filePath, file_get_contents($content));
        // dd($result);
        // $url = Storage::url('image');
    }
}
