<?php

use App\Http\Controllers\Customer\customerPenitipan;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerReportsPenitipan;
use App\Http\Controllers\customerPethouse;
use App\Http\Middleware\customerMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', customerMidleware::class])->group(function () {

    Route::prefix('pethouse')->group(function () {
        Route::get('/', [customerPethouse::class, 'index'])->name('customer.pethouse.index');
        Route::get('{id}', [customerPethouse::class, 'show'])->name('customer.pethouse.show');
        Route::post('{id}', [customerPethouse::class, 'store'])->name('customer.pethouse.store');
    });

    Route::prefix('penitipan')->group(function () {

        Route::get('/', [customerPenitipan::class, 'index'])->name('customer.penitipan.index');

        Route::get('{id}/create', [customerPenitipan::class, 'create'])->name('customer.penitipan.create');

        Route::get('{id}', [customerPenitipan::class, 'show'])->name('customer.penitipan.show');

        Route::patch('{id}', [customerPenitipan::class, 'update'])->name('customer.penitipan.update');

        Route::post('{id}', [customerPenitipan::class, 'store'])->name('customer.penitipan.store');

        Route::delete('{id}', [customerPenitipan::class, 'destroy'])->name('customer.penitipan.destory');

        Route::get('riwayat', [customerPenitipan::class, 'riwayat'])->name('customer.penitipan.riwayat');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/', [customerReports::class, 'create'])->name('customer.reports.index');
        Route::post('/', [customerReports::class, 'store'])->name('customer.reports.store');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [customerReports::class, 'index'])->name('customer.profile.index');
        Route::patch('/edit', [customerReports::class, 'index'])->name('customer.profile.edit');
        Route::patch('/', [customerReports::class, 'index'])->name('customer.profile.update');
    });
});
