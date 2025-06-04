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
        $layanans = Layanan::where('isdeleted', '=', 0)->orderBy('created_at', 'desc')->paginate(2);
        return view('pages.meowinn.Layanan.meowInnLayanan', compact('layanans'));
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
        if ($layanan) {
            return view('pages.meowinn.Layanan.meowinnLayananShow', compact('layanan'));
        }
        abort(404);
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view('pages.meowinn.Layanan.meowinnLayananEdit', compact('layanan'));
    }

    public function create()
    {
        return view('pages.meowinn.Layanan.meowinnLayananCreate');
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
            $validated['photos'] = json_encode($photoPaths);
        }


        Layanan::whereId($id)->update($validated);

        return redirect()->route('meowinn.layanan.show', ['id' => $id])->with('success', 'Berhasil Mengubah Layanan');
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

        return redirect()->route('meowinn.layanan.show', ['id' => $dataLayanan->id])->with('Berhasil menambahkan layanan');
    }
}
