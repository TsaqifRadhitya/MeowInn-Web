<?php

namespace App\Http\Controllers\PetHouse;

use App\HasCloudinary;
use Illuminate\Http\Request;
use App\Models\laporanPenitipan;
use App\Http\Controllers\Controller;


class pethousePenitipanReport extends Controller
{
    use HasCloudinary;
    public function create($id)
    {
        return view('pages.petHouse.LaporanPenitipan.create', compact("id"));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'caption' => ['required', 'string', 'min:1', 'max:500'],
                'photos' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048']
            ]
        );
        $validated['photos'] = $this->cloudinarySingleUpload($request->file('photos'), 'laporan/' . $id);
        laporanPenitipan::create([...$validated, 'penitipanId' => $id]);

        return redirect()->route('pethouse.penitipan.show', $id)->with('success', 'Berhasil mengirimkan laporan penitipan');

    }

    public function edit($id)
    {
        $laporan = laporanPenitipan::find($id);
        if ($laporan) {
            return view('pages.petHouse.LaporanPenitipan.edit', compact('laporan'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'caption' => ['required', 'string', 'min:1', 'max:500'],
                'photos' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048']
            ]
        );
        $laporan = laporanPenitipan::find($id);
        if ($laporan) {
            if ($request->hasFile('photos')) {
                $validated['photos'] = $this->cloudinarySingleUpload($request->file('photos'), 'laporan/' . $id);
            }

            $laporan->update($validated);
            return redirect()->route('pethouse.penitipan.show', $laporan->penitipanId)->with('success', 'Berhasil mengubah laporan penitipan');

        }
        ;
        abort(404);
    }

    public function destroy($id)
    {
        $deletedAmount = laporanPenitipan::destroy($id);

        if ($deletedAmount > 0) {
            return back()->with('success', 'Berhasil menghapus laporan penitipan');
        }
        abort(404);
    }
}
