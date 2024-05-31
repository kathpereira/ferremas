<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class VendedorController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id_producto', 'descripcion')->take(5)->get();
        return view('vendedor', compact('productos'));
    }
}