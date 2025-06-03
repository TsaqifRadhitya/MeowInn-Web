<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\Meowinn\meowinnkelolaLayanan;
use App\Http\Controllers\Meowinn\meowinnkelolaPethouse;
use App\Http\Controllers\Meowinn\meowinnreport;
use App\Http\Middleware\meowinnMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', meowinnMidleware::class])->group(function () {
    Route::prefix('meowinn')->group(function () {

        Route::get('/preview/{id}', [meowinnkelolaPethouse::class, 'show'])->name('meowinn.pethouse.show');

        Route::get('dashboard', [dashboard::class, 'meowinn'])->name('meowinn.dashboard');

        Route::prefix('daftarpethouse')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'index'])->name('meowinn.pethouse.index');
        });

        Route::prefix('pengajuanpethouse')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'pengajuan'])->name('meowinn.pengajuanpethouse.index');
            Route::get('{id}', [meowinnkelolaPethouse::class, 'show'])->name('meowinn.pengajuanpethouse.show');
            Route::delete('/{id}/delete', [meowinnkelolaPethouse::class, 'tolak'])->name('meowinn.pengajuanlayanan.delete');
            Route::patch('/{id}/edit', [meowinnkelolaPethouse::class, 'approve'])->name('meowinn.pengajuanlayanan.update');
        });

        Route::prefix('penalty')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'penalty'])->name('meowinn.penalty.index');
            Route::post('/{id}/create', [meowinnkelolaPethouse::class, 'penaltyCreate'])->name('meowinn.penalty.create');
            Route::delete('/{id}/delete', [meowinnkelolaPethouse::class, 'penaltyRemove'])->name('meowinn.penalty.delete');
        });

        Route::prefix('daftarlayanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'index'])->name('meowinn.layanan.index');
            Route::get('/create', [meowinnkelolaLayanan::class, 'create'])->name('meowinn.layanan.create');
            Route::get('{id}', [meowinnkelolaLayanan::class, 'show'])->name('meowinn.layanan.show');
            Route::post('/', [meowinnkelolaLayanan::class, 'store'])->name('meowinn.layanan.store');
            Route::delete('{id}', [meowinnkelolaLayanan::class, 'destroy'])->name('meowinn.layanan.destory');
            Route::patch('{id}', [meowinnkelolaLayanan::class, 'update'])->name('meowinn.layanan.update');
        });

        Route::get('reports', [meowinnreport::class, 'index'])->name('meowinn.reports.index');
    });
});
