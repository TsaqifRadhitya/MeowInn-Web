<?php

use App\Http\Controllers\Customer\customerPenitipan;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerReportsPenitipan;
use App\Http\Middleware\customerMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('penitipan')->group(function () {

        Route::prefix('daftarpenitipan')->group(function(){

            Route::get('/',[customerPenitipan::class,'index'])->name('customer.penitipan.daftarpenitipan.index');

        });

        Route::prefix('reports')->group(function(){

            Route::get('/',[customerReports::class,'index'])->name('customer.penitipan.reports.index');

        });
    });


    // Route::resource('reports', customerReports::class)->middleware(customerMidleware::class);

});
