<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\Meowinn\meowinnkelolaLayanan;
use App\Http\Controllers\Meowinn\meowinnkelolaPethouse;
use App\Http\Controllers\Meowinn\meowinnreport;
use App\Http\Middleware\meowinnMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', meowinnMidleware::class])->group(function () {
    Route::prefix('meowinn')->group(function () {

        Route::get('dashboard', [dashboard::class, 'meowinn'])->name('meowinn.dashboard');

        Route::prefix('daftarpethouse')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'index'])->name('meowinn.pethouse.daftarpethouse.index');
        });


        Route::prefix('penalty')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'penalty'])->name('meowinn.pethouse.penalty.index');
        });

        Route::prefix('daftarlayanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'index'])->name('meowinn.layanan.daftarlayanan.index');
        });

        Route::prefix('pengajuanlayanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'pengajuanLayanan'])->name('meowinn.layanan.pengajuanlayanan.index');
        });

        Route::get('reports', [meowinnreport::class, 'index'])->name('meowinn.reports.index');
    });
});
