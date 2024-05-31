<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\BodegueroController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\AdminController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para Bodeguero
Route::get('/bodeguero', [BodegueroController::class, 'index'])->name('bodeguero.index');
Route::post('/bodegueros', [BodegueroController::class, 'store'])->name('bodegueros.store');
Route::post('/bodeguero/add', [BodegueroController::class, 'add'])->name('bodeguero.add');  // Para sumar productos
Route::post('/bodeguero/remove', [BodegueroController::class, 'remove'])->name('bodeguero.remove');  // Para eliminar productos

// Otras vistas estáticas
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/cliente', function () {
    return view('cliente');
});
Route::get('/catalogo', function () {
    return view('catalogo');
});
Route::get('/adminVen', function () {
    return view('adminVen');
});
Route::get('/adminBod', function () {
    return view('adminBod');
});
Route::get('/adminCon', function () {
    return view('adminCon');
});
Route::get('/adminInicio', function () {
    return view('adminInicio');
});
Route::get('/adminLogin', function () {
    return view('adminLogin');
});

// Rutas para Cliente
Route::post('/registrar-cliente', [ClienteController::class, 'registrarCliente'])->name('registrar.cliente');
Route::get('/formulario-registro', function () {
    return view('login');
})->name('formulario.registro');
Route::get('/login', [ClienteController::class, 'mostrarFormularioInicioSesion'])->name('login');
Route::post('/login', [ClienteController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::post('/logout', [ClienteController::class, 'cerrarSesion'])->name('logout');

// Ruta para Catalogo
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');

// Rutas para Vendedor
Route::get('/vendedor', [VendedorController::class, 'index']);
Route::post('/vendedores', [VendedorController::class, 'store'])->name('vendedores.store');

// Rutas para Contador
Route::post('/contador', [ContadorController::class, 'store'])->name('contador.store');

// Rutas para Admin
Route::get('login', [AdminController::class, 'mostrarFormularioInicioSesion'])->name('login');
Route::post('/adminLogin', [AdminController::class, 'iniciarSesion'])->name('admin.iniciar_sesion');
Route::post('/adminInicio/logout', [AdminController::class, 'cerrarSesion'])->name('admin.cerrar_sesion');
Route::get('/adminBod/crear_bodeguero', [AdminController::class, 'mostrarFormularioCrearBodeguero'])->name('admin.mostrar_formulario_crear_bodeguero');
Route::post('/adminBod/crear_bodeguero', [AdminController::class, 'crearBodeguero'])->name('admin.crear_bodeguero');








