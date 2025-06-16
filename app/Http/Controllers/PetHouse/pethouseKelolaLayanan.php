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
        $status = $request->status === "1" ? true : false;
        $layanan->update(['status' => $status]);
        return back()->with('success', 'Barhasil mengubah status layanan');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'price' => ['numeric', 'required', 'min:1000'],
            'description' => ['nullable', 'string', 'min:1'],
            'photos' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status' => ['nullable', 'string']
        ]);

        $pethouseId = Auth::user()->petHouses->id;

        if ($request->hasFile('photos')) {
            $validated['photos'] = $this->cloudinarySingleUpload($request->file('photos'), Auth::user()->petHouses->name . '/layananphtos');
        }
        $validated['status'] = $request->status ? true : false;
        $layanan = detailLayanan::where([
            'layananId' => $id,
            'petHouseId' => $pethouseId,
        ])->first();

        if (!$layanan) {
            $layanan = detailLayanan::create([...$validated, 'layananId' => $id, 'petHouseId' => $pethouseId]);
        } else {
            $layanan->update($validated);
        }
        return redirect()->route('pethouse.layanan.index')->with('success', 'Berhasil mengubah layanan pethouse');
    }
}
