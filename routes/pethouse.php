<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\PetHouse\pethouseKelolaPethouse;
use App\Http\Controllers\PetHouse\pethouseVerifikasiController;
use App\Http\Middleware\pethouseVerifyCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\pethouseMidleware;
use App\Http\Controllers\PetHouse\pethouseProfile;
use App\Http\Controllers\PetHouse\pethouseKelolaLayanan;
use App\Http\Controllers\PetHouse\pethouseKelolaPenitipan;
use App\Http\Controllers\PetHouse\pethousePenitipanReport;

Route::middleware(['auth', pethouseMidleware::class])->group(function () {

    Route::prefix("pethouse")->group(function () {

        Route::get('profile', [pethouseProfile::class, 'index'])->name('pethouse.profile.index');

        Route::prefix('verifikasi')->group(function () {
            Route::get('/', [pethouseVerifikasiController::class, 'index'])->name('pethouse.verifikasi.index');
            Route::get('/create', [pethouseVerifikasiController::class, 'create'])->name('pethouse.verifikasi.create');
            Route::post('/create', [pethouseVerifikasiController::class, 'store'])->name('pethouse.verifikasi.store');
        });

        Route::get('/dashboard', [dashboard::class, 'pethouse'])->name('pethouse.dashboard');

        Route::middleware([pethouseVerifyCheck::class])->group(function () {
            Route::prefix('penitipan')->group(function () {
                Route::get('/', [pethouseKelolaPenitipan::class, 'index'])->name('pethouse.penitipan.index');
                Route::get('/riwayat', [pethouseKelolaPenitipan::class, 'riwayat'])->name('pethouse.penitipan.riwayat');
                Route::get('{id}', [pethouseKelolaPenitipan::class, 'show'])->name('pethouse.penitipan.show');
                Route::patch('{id}', [pethouseKelolaPenitipan::class, 'update'])->name('pethouse.penitipan.update');
            });

            Route::prefix('laporan')->group(function () {
                Route::get('{id}/create', [pethousePenitipanReport::class, 'create'])->name('pethouse.reports.create');
                Route::post('{id}', [pethousePenitipanReport::class, 'store'])->name('pethouse.reports.store');
                Route::patch('{id}', [pethousePenitipanReport::class, 'update'])->name('pethouse.reports.update');
                Route::get('{id}/edit', [pethousePenitipanReport::class, 'edit'])->name('pethouse.reports.edit');
                Route::delete('{id}', [pethousePenitipanReport::class, 'destroy'])->name('pethouse.reports.destroy');
            });

            Route::prefix('managepethouse')->group(function () {
                Route::get('/preview', [pethouseKelolaPethouse::class, 'index'])->name('pethouse.index');
                Route::get('/setting', [pethouseKelolaPethouse::class, 'edit'])->name('pethouse.setting.edit');
                Route::patch('/setting', [pethouseKelolaPethouse::class, 'update'])->name('pethouse.setting.update');
                Route::prefix('layanan')->group(function () {
                    Route::get('/', [pethouseKelolaLayanan::class, 'index'])->name('pethouse.layanan.index');
                    Route::get('{id}/edit', [pethouseKelolaLayanan::class, 'edit'])->name('pethouse.layanan.edit');
                    Route::patch('{id}', [pethouseKelolaLayanan::class, 'update'])->name('pethouse.layanan.update');
                    Route::patch('{id}/status', [pethouseKelolaLayanan::class, 'updateStatus'])->name('pethouse.layanan.status');
                });
            });
        });
    });
});
