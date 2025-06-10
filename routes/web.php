<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\midtransController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome.index');

Route::post('midtrans/callback',[midtransController::class,'update'])->name('midtrans.callback');

Route::get('/dashboard', [dashboard::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/meowinn.php';
require __DIR__ . '/customer.php';
require __DIR__ . '/pethouse.php';
