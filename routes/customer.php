<?php

use App\Http\Controllers\Customer\customerPenitipan;
use App\Http\Controllers\Customer\customerReports;
use App\Http\Controllers\Customer\customerReportsPenitipan;
use App\Http\Middleware\customerMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::resource('penitipan',customerPenitipan::class)->middleware(customerMidleware::class);

    Route::resource('penitipan/reports',customerReportsPenitipan::class)->middleware(customerMidleware::class);

    Route::resource('reports',customerReports::class)->middleware(customerMidleware::class);
});
