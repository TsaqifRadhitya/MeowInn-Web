<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\Meowinn\meowinnkelolaLayanan;
use App\Http\Controllers\Meowinn\meowinnkelolaPethouse;
use App\Http\Controllers\Meowinn\meowinnreport;
use App\Http\Middleware\meowinnMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', meowinnMidleware::class])->group(function () {
    Route::prefix('meowinn')->group(function () {

        Route::get('/preview/{id}',[meowinnkelolaPethouse::class,'viewDetail'])->name('meowinn.pethouse.preview');

        Route::get('dashboard', [dashboard::class, 'meowinn'])->name('meowinn.dashboard');

        Route::prefix('daftarpethouse')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'index'])->name('meowinn.pethouse.daftarpethouse.index');
        });

        Route::prefix('pengajuanpethouse')->group(function () {
            Route::get('/',[meowinnkelolaPethouse::class,'pengajuan'])->name('meowinn.pethouse.pengajuanpethouse.index');
            Route::delete('/{id}/delete', [meowinnkelolaPethouse::class, 'tolak'])->name('meowinn.pethouse.pengajuanlayanan.delete');
            Route::patch('/{id}/edit', [meowinnkelolaPethouse::class, 'approve'])->name('meowinn.pethouse.pengajuanlayanan.update');
        });

        Route::prefix('penalty')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'penalty'])->name('meowinn.pethouse.penalty.index');
            Route::post('/{id}/create', [meowinnkelolaPethouse::class, 'penaltyCreate'])->name('meowinn.pethouse.penalty.create');
            Route::delete('/{id}/delete', [meowinnkelolaPethouse::class, 'penaltyRemove'])->name('meowinn.pethouse.penalty.delete');
        });

        Route::prefix('daftarlayanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'index'])->name('meowinn.layanan.daftarlayanan.index');
            Route::post('/create', [meowinnkelolaLayanan::class, 'create'])->name('meowinn.layanan.daftarlayanan.create');
            Route::delete('{id}/delete', [meowinnkelolaLayanan::class, 'delete'])->name('meowinn.layanan.daftarlayanan.delete');
            Route::patch('{id}/edit', [meowinnkelolaLayanan::class, 'edit'])->name('meowinn.layanan.daftarlayanan.edit');
        });

        Route::prefix('pengajuanlayanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'pengajuanLayanan'])->name('meowinn.layanan.pengajuanlayanan.index');
            Route::delete('/{id}/delete', [meowinnkelolaLayanan::class, 'tolakPengajuan'])->name('meowinn.layanan.pengajuanlayanan.delete');
            Route::patch('/{id}/edit', [meowinnkelolaLayanan::class, 'terimaPengajuan'])->name('meowinn.layanan.pengajuanlayanan.update');
        });

        Route::get('reports', [meowinnreport::class, 'index'])->name('meowinn.reports.index');
    });
});
