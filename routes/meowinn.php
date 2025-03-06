<?php
use App\Http\Controllers\Meowinn\meowinnkelolaLayanan;
use App\Http\Controllers\Meowinn\meowinnkelolaPethouse;
use App\Http\Controllers\Meowinn\meowinnreport;
use App\Http\Middleware\meowinnMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::prefix('meowinn')->group(function(){
        Route::resource('pethouse',meowinnkelolaPethouse::class)->middleware(meowinnMidleware::class);

        Route::resource('Layanan',meowinnkelolaLayanan::class)->middleware(meowinnMidleware::class);

        Route::resource('reports',meowinnreport::class)->middleware(meowinnMidleware::class);
    });
});
