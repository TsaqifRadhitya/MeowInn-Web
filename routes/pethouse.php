<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\PetHouse\pethousekelolaLayanan;
use App\Http\Controllers\PetHouse\pethousekelolaPenitipan;
use App\Http\Controllers\PetHouse\pethouseKelolaPetHouse;
use App\Http\Controllers\PetHouse\pethouseReport;
use App\Http\Middleware\pethouseMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', pethouseMidleware::class])->group(function () {
    Route::prefix("pethouse")->group(function () {

        Route::get('dashboard', [dashboard::class, 'pethouse'])->name('pethouse.dashboard');

        Route::prefix('daftarlayanan')->group(function () {

            Route::get('/', [pethousekelolaLayanan::class, 'index'])->name('pethouse.layanan.daftarlayanan.index');
        });

        Route::prefix('daftarpentipan')->group(function () {
            Route::get('/', [pethousekelolaPenitipan::class, 'daftarPenitipan'])->name('pethouse.penitipan.daftarpenitipan.index');
        });

        Route::get('riwayatpenitipan', [pethousekelolaPenitipan::class, 'riwayatPenitipan'])->name('pethouse.penitipan.riwayatpenitipan.index');

        Route::prefix('reports')->group(function () {
            Route::get('/', [pethouseReport::class, 'index'])->name('pethouse.reports.index');

            Route::get('{id}', [pethousekelolaPenitipan::class, 'daftarReports'])->name('pethouse.penitipan.reports.index');

            Route::get('{id}/detail', [pethousekelolaPenitipan::class, 'daftarReports'])->name('pethouse.penitipan.reports.detail');
        });


        Route::prefix('managepethouse')->group(function () {

            Route::get('/preview', [pethouseKelolaPetHouse::class,'index'])->name('pethouse.managepethouse.preview.index');

            Route::get('/setting', [pethouseKelolaPetHouse::class,'setting'])->name('pethouse.managepethouse.setting.index');

        });
    });
});
