<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $productos = Producto::all();
        return view('catalogo', compact('productos'));
    }
}