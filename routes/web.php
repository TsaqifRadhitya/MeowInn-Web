<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\midtransController;
use App\Http\Controllers\ProfileController;
use Cloudinary\Transformation\Rotate;
use Illuminate\Support\Facades\Route;

Route::get('/', [dashboard::class, 'user'])->name('home');

Route::post('midtrans/callback', [midtransController::class, 'update'])->name('midtrans.callback');

Route::get('/dashboard', [dashboard::class, 'index'])->middleware('auth')->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/meowinn.php';
require __DIR__ . '/pethouse.php';
require __DIR__ . '/customer.php';
