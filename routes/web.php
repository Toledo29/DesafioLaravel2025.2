<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest:web_usuario,web_admin')->group(function(){
    Route::get('/login1', [LoginController::class, 'index']);
    Route::post('/login1', [LoginController::class, 'login'])->name('login');
});

Route::get('/dashboard1', [DashboardController::class, '__invoke'])->middleware('auth:web_usuario,web_admin', 'verified')->name('dashboard1');

Route::middleware('auth:web_usuario,web_admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web_usuario,web_admin', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
