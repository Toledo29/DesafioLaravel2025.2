<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\produtosAdm;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoreProdutoRequest;
use App\Http\Controllers\vendasAdm;
use App\Http\Controllers\vendasPdf;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest:web_usuario,web_admin')->group(function(){
    Route::get('/login1', [LoginController::class, 'index']);
    Route::post('/login1', [LoginController::class, 'login'])->name('login1');
});

Route::middleware('auth:web_usuario,web_admin', 'verified')->group(function () {

    Route::get('/dashboard1', [DashboardController::class, '__invoke'])->name('dashboard1');

    Route::get('/produtos/{produto}/show', [ProdutoController::class, 'show'])->name('produtos.show');

    Route::get('/produtos/produtosAdm', [produtosAdm::class, '__invoke'])->name('produtos.produtosAdm');
    Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

    Route::get('/logout' , [LogoutController::class, '__invoke'])->name('logout');

    Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('produtos/{produto}/edit', [ProdutoController::class, 'update'])->name('produtos.update');

    Route::get('/vendas/vendasAdm', [vendasAdm::class, '__invoke'])->name('vendas.vendasAdm');

    Route::get('/vendas/pdf', [vendasPdf::class, '__invoke'])->name('vendas.vendasPdf');


    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:web_usuario', 'verified')->group(function () {
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/create', [ProdutoController::class, 'store']);
});

require __DIR__.'/auth.php';
