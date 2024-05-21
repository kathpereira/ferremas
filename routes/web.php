<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/cliente', function () {
    return view('cliente');
});

Route::post('/registrar-cliente', [ClienteController::class, 'registrarCliente'])->name('registrar.cliente');

Route::get('/formulario-registro', function () {
    return view('login');
})->name('formulario.registro');

Route::get('/login', [ClienteController::class, 'mostrarFormularioInicioSesion'])->name('login');

Route::post('/login', [ClienteController::class, 'iniciarSesion'])->name('iniciarSesion');

Route::post('/logout', [ClienteController::class, 'cerrarSesion'])->name('logout');