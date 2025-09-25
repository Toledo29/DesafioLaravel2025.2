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
use App\Http\Controllers\CepController;
use App\Http\Controllers\usuariosAdm;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PagSeguroController;


Route::get('/', function () {
    return view('dashboard1');
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

    Route::get('/buscar-cep', [CepController::class, 'buscarCep'])->name('cep.buscar');

    Route::get('/usuarios/{usuario}/show', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:web_usuario', 'verified')->group(function () {
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/create', [ProdutoController::class, 'store']);
    Route::post('/checkout', [PagSeguroController::class, 'checkout'])->name('checkout');
    Route::get('/compras/comprasAdm', [comprasAdm::class, '__invoke'])->name('compras.comprasAdm');
    Route::get('/compras/pdf', [comprasPdf::class, '__invoke'])->name('compras.pdf');
});

Route::middleware('auth:web_admin', 'verified')->group(function () {
    Route::get('/usuarios/usuariosAdm', [usuariosAdm::class, '__invoke'])->name('usuarios.usuariosAdm');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios/create', [UsuarioController::class, 'store'])->name('usuarios.store');

    Route::get('/admins/adminAdm', [App\Http\Controllers\adminAdm::class, '__invoke'])->name('admins.adminAdm');
    Route::get('/admins/{admin}/show', [App\Http\Controllers\AdminController::class, 'show'])->name('admins.show');
    Route::get('admins/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admins.create');
    Route::post('admins/create', [App\Http\Controllers\AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{admin}', [App\Http\Controllers\AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admins.destroy');
});

require __DIR__.'/auth.php';
