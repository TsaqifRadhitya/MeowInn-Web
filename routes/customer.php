<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\customerMidleware;
use App\Http\Controllers\Customer\customerProfile;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerPethouse;
use App\Http\Controllers\Customer\customerPenitipan;

Route::middleware(['auth', customerMidleware::class])->group(function () {

    Route::prefix('pethouse')->group(function () {
        Route::get('/', [customerPethouse::class, 'index'])->name('customer.pethouse.index');
        Route::get('{id}', [customerPethouse::class, 'show'])->name('customer.pethouse.show');
        Route::post('{id}', [customerReports::class, 'storePethouse'])->name('customer.pethouse.store');
    });

    Route::prefix('penitipan')->group(function () {

        Route::get('/', [customerPenitipan::class, 'index'])->name('customer.penitipan.index');

        Route::get('riwayat', [customerPenitipan::class, 'riwayat'])->name('customer.penitipan.riwayat');

        Route::get('{id}/create', [customerPenitipan::class, 'create'])->name('customer.penitipan.create');

        Route::post('/', [customerPenitipan::class, 'store'])->name('customer.penitipan.store');

        Route::get('{id}', [customerPenitipan::class, 'show'])->name('customer.penitipan.show');

        Route::delete('{id}', [customerPenitipan::class, 'destroy'])->name('customer.penitipan.destory');

        Route::post('{id}', [customerReports::class, 'storePenitipan'])->name('customer.penitipan.report');

    });

    Route::prefix('reports')->group(function () {
        Route::get('/', [customerReports::class, 'create'])->name('customer.reports.index');
        Route::post('/', [customerReports::class, 'store'])->name('customer.reports.store');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [customerProfile::class, 'index'])->name('customer.profile.index');
        Route::get('/edit', [customerProfile::class, 'edit'])->name('customer.profile.edit');
        Route::patch('/', [customerProfile::class, 'update'])->name('customer.profile.update');
    });
});
