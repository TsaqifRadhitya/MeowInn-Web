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
        // return view(, compact("id"));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'caption' => ['required', 'string', 'min:1', 'max:500'],
                'photos' => ['required', 'array'],
                'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:2048']
            ]
        );

        laporanPenitipan::create([...$validated, 'penitipanId' => $id]);

        return back()->with('success', 'Berhasil Mengirimkan Laporan Penitipan');

    }

    public function edit()
    {

    }

    public function update(Request $request, $penitipanId, $reportId)
    {
        $validated = $request->validate(
            [
                'caption' => ['nullable', 'string', 'min:1', 'max:500'],
                'photos' => ['nullable', 'array'],
                'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:2048']
            ]
        );

        if ($request->hasFile('photos')) {
            $validated['photos'] = json_encode($this->cloudinaryBatchUpload($request->file('photos'), 'penitipan/' . $penitipanId . '/laporan'));
        }

        $updated = laporanPenitipan::where('penitipanId', $penitipanId)->where('id ', $reportId)->update($validated);

        if ($updated) {
            return back()->with('success', 'Berhasil Mengubah Laporan Penitipan');
        }
        abort(404);
    }

    public function destroy($penitipanId, $reportId)
    {
        $deletedAmount = laporanPenitipan::where('id', $reportId)->where('penitipanId', $penitipanId)->delete();

        if ($deletedAmount > 0) {
            return back()->with('success', 'Berhasil Menghapus Laporan Penitipan');
        }
        abort(404);
    }
}
