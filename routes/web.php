<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cliente', function () {
    return view('cliente');
});

use App\Http\Controllers\ClienteController;

Route::post('/registrar', [ClienteController::class, 'registrar'])->name('registrar.cliente');

Route::get('/Cliente', [ClienteController::class, 'registroExitoso'])->name('registro.exitoso');

Route::get('/formulario-registro', function () {
    return view('login');
})->name('formulario.registro');

Route::post('/registrar-cliente', [ClienteController::class, 'registrarCliente'])->name('registrar.cliente');
