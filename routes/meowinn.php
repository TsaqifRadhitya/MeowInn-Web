<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\Meowinn\meowinnKelolaLayanan;
use App\Http\Controllers\Meowinn\meowinnKelolaPethouse;
use App\Http\Controllers\Meowinn\meowinnReport;
use App\Http\Controllers\Meowinn\profileAdminController;
use App\Http\Middleware\meowinnMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', meowinnMidleware::class])->group(function () {
    Route::prefix('meowinn')->group(function () {

        Route::prefix('profile')->group(function () {
            Route::get('/', [profileAdminController::class, 'index'])->name('meowinn.profile.index');
            Route::get('edit', [profileAdminController::class, 'edit'])->name('meowinn.profile.edit');
            Route::patch('edit', [profileAdminController::class, 'update'])->name('meowinn.profile.update');
        });

        Route::get('/', [dashboard::class, 'meowinn'])->name('meowinn.dashboard');

        Route::prefix('pethouse')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'index'])->name('meowinn.pethouse.index');
            Route::get('/preview/{id}', [meowinnkelolaPethouse::class, 'show'])->name('meowinn.pethouse.show');
        });

        Route::prefix('pengajuan')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'pengajuan'])->name('meowinn.pengajuanpethouse.index');
            Route::delete('/{id}', [meowinnkelolaPethouse::class, 'tolak'])->name('meowinn.pengajuanlayanan.delete');
            Route::patch('/{id}', [meowinnkelolaPethouse::class, 'approve'])->name('meowinn.pengajuanlayanan.update');
        });

        Route::prefix('penalty')->group(function () {
            Route::get('/', [meowinnkelolaPethouse::class, 'penalty'])->name('meowinn.penalty.index');
            Route::post('/{id}/create', [meowinnkelolaPethouse::class, 'penaltyCreate'])->name('meowinn.penalty.create');
            Route::delete('/{id}/delete', [meowinnkelolaPethouse::class, 'penaltyRemove'])->name('meowinn.penalty.delete');
        });

        Route::prefix('layanan')->group(function () {
            Route::get('/', [meowinnkelolaLayanan::class, 'index'])->name('meowinn.layanan.index');
            Route::get('/create', [meowinnkelolaLayanan::class, 'create'])->name('meowinn.layanan.create');
            Route::post('/', [meowinnkelolaLayanan::class, 'store'])->name('meowinn.layanan.store');
            Route::get('{id}', [meowinnkelolaLayanan::class, 'show'])->name('meowinn.layanan.show');
            Route::get('{id}/edit', [meowinnkelolaLayanan::class, 'edit'])->name('meowinn.layanan.edit');
            Route::patch('{id}', [meowinnkelolaLayanan::class, 'update'])->name('meowinn.layanan.update');
            Route::delete('{id}', [meowinnkelolaLayanan::class, 'destroy'])->name('meowinn.layanan.destroy');
        });

        Route::get('reports', [meowinnreport::class, 'index'])->name('meowinn.reports.index');
    });
});
