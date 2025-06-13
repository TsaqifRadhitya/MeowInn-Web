<?php

namespace App\Http\Controllers\PetHouse;

use App\HasCloudinary;
use App\Http\Controllers\Controller;
use App\Models\detailLayanan;
use App\Models\Layanan;
use Auth;
use Illuminate\Http\Request;

class pethouseKelolaLayanan extends Controller
{
    use HasCloudinary;
    public function index()
    {
        $layanans = Layanan::with('pethouselayanans')->where('isdeleted', false)->paginate(4);
        return view('pages.petHouse.Layanan.Index', compact('layanans'));
    }

    public function destroy($id)
    {
        detailLayanan::whereId($id)->update(['status' => false]);
        return back()->with('success', 'Berhasil Menonaktifkan Layanan');
    }

    public function show($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            return view('pages.petHouse.Layanan.Show', compact('layanan'));
        }
        ;
        abort(404);
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            return view('pages.petHouse.Layanan.Edit', compact('layanan'));
        }
        ;
        abort(404);
    }

    public function updateStatus(Request $request, $id)
    {
        $layanan = Layanan::find($id)->pethouselayanans;
        if (!$layanan || !$layanan?->price) {
            return back()->with('error', 'Harap mengatur harga layanan terlebih dahulu');
        }
        $status = $request->isActive === "1" ? true : false;
        $layanan->update(['isActive' => $status]);
        return back()->with('success', 'Barhasil mengubah status layanan');
    }
    public function update(Request $request, $id)
    {
        dd($request->all());
        $validated = $request->validate([
            'price' => ['numeric', 'required', 'min:1'],
            'description' => ['nullable', 'string', 'min:1'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status' => ['nullable', 'boolean']
        ]);

        $pethouseId = Auth::user()->petHouses->id;

        if ($request->hasFile('photos')) {
            $validated['photos'] = $this->cloudinaryBatchUpload($request->file('photos'), Auth::user()->petHouses->name . '/layananphtos');
        }

        $layanan = detailLayanan::where([
            'layananId' => $id,
            'petHouseId' => $pethouseId,
        ])->first();

        if (!$layanan) {
            $layanan = detailLayanan::create([...$validated, 'layananId' => $id, 'petHouseId' => $pethouseId]);
        } else {
            $layanan->update($validated);
        }

        return back()->with('success', 'Berhasil Mengubah Layanan Pethouse');
    }
}
