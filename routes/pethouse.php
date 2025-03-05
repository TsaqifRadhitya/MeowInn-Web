<?php
use App\Http\Controllers\PetHouse\pethousekelolaLayanan;
use App\Http\Controllers\PetHouse\pethousekelolaPethouse;
use App\Http\Controllers\PetHouse\pethouseReport;
use App\Http\Middleware\pethouseMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::prefix("pethouse")->group(function(){
        Route::resource('pethouse',pethousekelolaPethouse::class)->middleware(pethouseMidleware::class);

        Route::resource('Layanan',pethousekelolaLayanan::class)->middleware(pethouseMidleware::class);

        Route::resource('reports',pethouseReport::class)->middleware(pethouseMidleware::class);
    });
});
