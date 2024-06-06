<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\BodegueroController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransbankController;

Route::post('/bodeguero/generateReport', [BodegueroController::class, 'generateReport'])->name('bodeguero.generateReport');
Route::post('/bodeguero/generateReport', [BodegueroController::class, 'generateReport'])->name('bodeguero.generateReport');



// Otras vistas estáticas
Route::get('/', function () {
    return view('inicio');
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

Route::get('/bodeguero', function () {
    return view('bodeguero');
});

Route::get('/adminVen', function () {
    return view('adminVen');
});
Route::get('/adminBod', function () {
    return view('adminBod');
})->name('admin.bodeguero');

Route::get('/adminCon', function () {
    return view('adminCon');
});
Route::get('/adminInicio', function () {
    return view('adminInicio');
});
Route::get('/adminLogin', function () {
    return view('adminLogin');
});

Route::get('/bodegueroLogin', function () {
    return view('bodegueroLogin');
});

Route::get('/contadorLogin', function () {
    return view('contadorLogin');
});

Route::get('/contador', function () {
    return view('contador');
});

Route::get('/vendedorLogin', function () {
    return view('vendedorLogin');
});

Route::get('/failure', function () {
    return view('failure');
});

Route::get('/success', function () {
    return view('success');
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
Route::post('/vendedor', [VendedorController::class, 'iniciarSesion'])->name('vendedor.iniciar_sesion');

// Rutas para Contador
Route::post('/contadores', [ContadorController::class, 'store'])->name('contadores.store');
Route::post('/contador', [ContadorController::class, 'iniciarSesion'])->name('contador.iniciar_sesion');
Route::post('/contador/generateReport', [ContadorController::class, 'generateReport'])->name('contador.generateReport');

// Rutas para Admin
Route::post('/adminLogin', [AdminController::class, 'iniciarSesion'])->name('admin.iniciar_sesion');
Route::post('/adminInicio/logout', [AdminController::class, 'cerrarSesion'])->name('admin.cerrar_sesion');

// Rutas para bodeguero
Route::post('/bodegueros', [BodegueroController::class, 'iniciarSesion'])->name('bodeguero.iniciar_sesion');
Route::post('/bodeguero', [BodegueroController::class, 'store'])->name('bodegueros.store');
Route::get('/bodeguero', [BodegueroController::class, 'index'])->name('bodeguero.index');
Route::post('/bodeguero/add', [BodegueroController::class, 'add'])->name('bodeguero.add');  // Para sumar productos
Route::post('/bodeguero/remove', [BodegueroController::class, 'remove'])->name('bodeguero.remove');  // Para eliminar productos

//Rutas Transbank
Route::post('/pagar', [TransbankController::class, 'createTransaction'])->name('transbank.create');
Route::post('/callback', [TransbankController::class, 'callback'])->name('transbank.callback');

//Rutas Categoria
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::post('/catalogo', [CatalogoController::class, 'store'])->name('catalogo.store');
Route::get('/callback', [TransbankController::class, 'callback'])->name('transbank.callback');
