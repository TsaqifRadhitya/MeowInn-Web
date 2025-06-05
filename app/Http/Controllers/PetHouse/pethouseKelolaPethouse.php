<?php

namespace App\Http\Controllers\PetHouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pethouseKelolaPetHouse extends Controller
{
    public function index()
    {
        return view('pages.petHouse.petHouseSetting.petHousePreview');
    }

    public function edit()
    {
        return view('pages.petHouse.petHouseSetting.petHouseSetting');
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
