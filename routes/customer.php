<?php

use App\Http\Middleware\customerAddressCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\customerMidleware;
use App\Http\Controllers\Customer\customerProfile;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerPethouse;
use App\Http\Controllers\Customer\customerPenitipan;

Route::middleware(['auth', customerMidleware::class])->group(function () {

    Route::prefix('pethouseterdekat')->group(function () {
        Route::get('/', [customerPethouse::class, 'index'])->name('customer.pethouse.index');
        Route::get('{id}', [customerPethouse::class, 'show'])->name('customer.pethouse.show');
        Route::post('{id}', [customerReports::class, 'storePethouse'])->name('customer.pethouse.store');
    })->middleware([customerAddressCheck::class]);

    Route::prefix('penitipan')->group(function () {

        Route::get('/', [customerPenitipan::class, 'index'])->name('customer.penitipan.index');

        Route::get('{id}/create', [customerPenitipan::class, 'create'])->name('customer.penitipan.create');

        Route::post('{id}', [customerPenitipan::class, 'store'])->name('customer.penitipan.store');

        Route::get('{id}', [customerPenitipan::class, 'show'])->name('customer.penitipan.show');

        Route::post('{id}/report', [customerReports::class, 'storePenitipan'])->name('customer.penitipan.report');

    })->middleware(customerAddressCheck::class);

    Route::post('reports/', [customerReports::class, 'store'])->name('customer.reports.store');

    Route::prefix('profile')->group(function () {
        Route::get('/', [customerProfile::class, 'index'])->name('customer.profile.index');
        Route::get('/edit', [customerProfile::class, 'edit'])->name('customer.profile.edit');
        Route::patch('/', [customerProfile::class, 'update'])->name('customer.profile.update');
    });
});
