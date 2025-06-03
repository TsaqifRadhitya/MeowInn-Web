<?php

namespace App\Http\Controllers\Meowinn;

use App\Http\Controllers\Controller;
use App\Models\detailLayanan;
use App\Models\Layanan;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class meowinnkelolaLayanan extends Controller
{
    public function index()
    {
        $daftarLayanan = Layanan::where('isdeleted', '=', 0)->orderBy('id', 'asc')->get();
        return view('pages.meowinn.Layanan.meowInnLayanan', compact('daftarLayanan'));
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            $layanan->update(['isdeleted' => true]);
            return back()->with('success', 'Berhasil menghapus layanan');
        }
        abort(404);
    }

    public function show($id)
    {
        $layanan = Layanan::find($id);
        return view('',compact('layanan'));
    }

    public function create($id)
    {
        return view();
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:layanans,name,' . $id . ',id'],
            'description' => [
                'required',
                'string'
            ],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('layanans', 'public');
                $photoPaths[] = $path;
            }
        }

        $validated['photos'] = json_encode($photoPaths);
        Layanan::whereId($id)->update($validated);

        return response("Berhasil Mengubah Layanan $request->input('nama_layanan')", 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:layanans,name'],
            'description' => [
                'required',
                'string'
            ],
            'photos' => ['required', 'array'],
            'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('layanans', 'public');
                $photoPaths[] = $path;
            }
        }

        $validated['photos'] = json_encode($photoPaths);

        $dataLayanan = Layanan::create($validated);

        return redirect()->route('meowinn.layanan.daftarlayanan.show', ['id' => $dataLayanan->id])->with('Berhasil menambahkan layanan');
    }
}
