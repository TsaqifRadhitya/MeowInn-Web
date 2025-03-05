<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[dashboard::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('test/{id}', function ($id) {
    $user = DB::table('users')->where('id','>',$id)->get();
    if($id % 2 == 0){
        return Response::json(['user' => $user],200);
    }
    return response(null,500);
})->name('test.delete');

Route::post('test/{id}', function ($id) {
    return back()->with('message', 'update success');
})->name('test.store');

Route::get('test', function () {
    return view('test');
})->name('test.index');

require __DIR__ . '/auth.php';
require __DIR__ . '/meowinn.php';
require __DIR__ . '/customer.php';
require __DIR__ . '/pethouse.php';
