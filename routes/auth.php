<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\pethouseRegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;

Route::post('logout', [authController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', [authController::class, 'loginIndex'])->name('login.store');
        Route::post('/', [authController::class, 'loginStore'])->name('login');

        Route::get('oauth', [authController::class, 'oauthRedirect'])->name('login.oauth');
    });

    Route::get('oauth', [authController::class, 'oauthCallback'])->name('oauth.callback');

    Route::prefix('register')->group(function () {
        Route::get('/option', [authController::class, 'registerOption'])->name('register.option');

        Route::get('/', [authController::class, 'registerCustomer'])->name('register');
        Route::post('/', [authController::class, 'registerCustomerStore'])->name('register.store');

        Route::get('/pethouse', [authController::class, 'registerPethouse'])->name('register.pethouse.index');
        Route::post('/pethouse', [authController::class, 'registerPethouseStore'])->name('register.pethouse.store');

        Route::get('oauth', [authController::class, 'oauthRedirect'])->name('register.oauth');
    });
});
