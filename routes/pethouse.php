<?php

use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\pethouseMidleware;
use App\Http\Controllers\PetHouse\pethouseProfile;
use App\Http\Controllers\PetHouse\pethousekelolaLayanan;
use App\Http\Controllers\PetHouse\pethouseKelolaPetHouse;
use App\Http\Controllers\PetHouse\pethousekelolaPenitipan;
use App\Http\Controllers\PetHouse\pethousePenitipanReport;

Route::middleware(['auth', pethouseMidleware::class])->group(function () {

    Route::prefix("pethouse")->group(function () {

        Route::prefix('profile')->group(function () {
            Route::get('/', [pethouseProfile::class, 'index'])->name('pethouse.profile.index');
            Route::get('edit', [pethouseProfile::class, 'edit'])->name('pethouse.profile.edit');
            Route::patch('edit', [pethouseProfile::class, 'update'])->name('pethouse.profile.update');
        });

        Route::get('/', [dashboard::class, 'pethouse'])->name('pethouse.dashboard');

        Route::prefix('penitipan')->group(function () {
            Route::get('/', [pethousekelolaPenitipan::class, 'index'])->name('pethouse.penitipan.index');
            Route::get('/riwayat', [pethousekelolaPenitipan::class, 'riwayat'])->name('pethouse.penitipan.riwayat');
            Route::get('{id}', [pethousekelolaPenitipan::class, 'show'])->name('pethouse.penitipan.show');
            Route::patch('{id}', [pethousekelolaPenitipan::class, 'update'])->name('pethouse.penitipan.update');
        });

        Route::prefix('laporan')->group(function () {
            Route::get('{id}', [pethousePenitipanReport::class, 'create'])->name('pethose.reports.create');
            Route::post('{id}', [pethousePenitipanReport::class, 'store'])->name('pethose.reports.store');
            Route::get('{penitipanId}/{reportId}', [pethousePenitipanReport::class, 'edit'])->name('pethose.reports.edit');
            Route::patch('{penitipanId}/{reportId}', [pethousePenitipanReport::class, 'update'])->name('pethose.reports.update');
            Route::delete('{penitipanId}/{reportId}', [pethousePenitipanReport::class, 'destroy'])->name('pethose.reports.destory');
        });

        Route::prefix('managepethouse')->group(function () {
            Route::get('/preview', [pethouseKelolaPetHouse::class, 'index'])->name('pethouse.index');
            Route::get('/setting', [pethouseKelolaPetHouse::class, 'edit'])->name('pethouse.setting.edit');
            Route::patch('/setting', [pethouseKelolaPetHouse::class, 'update'])->name('pethouse.setting.update');
            Route::prefix('layanan')->group(function () {
                Route::get('/', [pethousekelolaLayanan::class, 'index'])->name('pethouse.layanan.index');
                Route::get('{id}', [pethousekelolaLayanan::class, 'show'])->name('pethouse.layanan.show');
                Route::get('{id}/edit', [pethousekelolaLayanan::class, 'edit'])->name('pethouse.layanan.edit');
                Route::patch('{id}', [pethousekelolaLayanan::class, 'update'])->name('pethouse.layanan.update');
                Route::delete('{id}', [pethousekelolaLayanan::class, 'destory'])->name('pethouse.layanan.destroy');
            });
        });
    });
});
