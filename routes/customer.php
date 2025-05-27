<?php

use App\Http\Controllers\Customer\customerPenitipan;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerReportsPenitipan;
use App\Http\Middleware\customerMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', customerMidleware::class])->group(function () {

    Route::prefix('penitipan')->group(function () {

        Route::get('/create', [customerPenitipan::class, 'create'])->name('customer.penitipan.create');

        Route::prefix('daftarpenitipan')->group(function () {

            Route::get('/', [customerPenitipan::class, 'index'])->name('customer.penitipan.daftarpenitipan.index');

            Route::get('{id}/detail', [customerPenitipan::class, 'detailPenitipan'])->name('customer.penitipan.daftarpenitipan.show');

            Route::get('riwayat', [customerPenitipan::class, 'riwayatPenitipan'])->name('customer.penitipan.daftarpenitipan.riwayat');
        });
        Route::prefix('reports')->group(function () {

            Route::get('/', [customerReports::class, 'index'])->name('customer.reports.index');

            Route::get('{id}', [customerPenitipan::class, 'daftarReports'])->name('customer.penitipan.reports.index');

            Route::get('{id}/detail', [customerPenitipan::class, 'detailReports'])->name('customer.penitipan.reports.detail');
        });
    });
});
