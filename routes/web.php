<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\VendedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/cliente', function () {
    return view('cliente');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::post('/registrar-cliente', [ClienteController::class, 'registrarCliente'])->name('registrar.cliente');

Route::get('/formulario-registro', function () {
    return view('login');
})->name('formulario.registro');

Route::get('/login', [ClienteController::class, 'mostrarFormularioInicioSesion'])->name('login');

Route::post('/login', [ClienteController::class, 'iniciarSesion'])->name('iniciarSesion');

Route::post('/logout', [ClienteController::class, 'cerrarSesion'])->name('logout');

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');

Route::get('/vendedor', [VendedorController::class, 'index']);