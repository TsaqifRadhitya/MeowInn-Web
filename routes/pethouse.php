<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\PetHouse\pethousekelolaLayanan;
use App\Http\Controllers\PetHouse\pethouseKelolaPetHouse;
use App\Http\Controllers\PetHouse\pethouseReport;
use App\Http\Middleware\pethouseMidleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', pethouseMidleware::class])->group(function () {
    Route::prefix("pethouse")->group(function () {

        Route::get('/dashboard',[dashboard::class,'pethouse'])->name('pethouse.dashboard');

        // Route::prefix('layanan')->group(function () {

        //     Route::resource('/daftarlayanan', pethousekelolaLayanan::class);
        // });


        // Route::resource('reports', pethouseReport::class);

        // Route::prefix('managepethouse')->group(function () {

        //     Route::resource('/profile', pethouseKelolaPetHouse::class);
        // });
    });
});
