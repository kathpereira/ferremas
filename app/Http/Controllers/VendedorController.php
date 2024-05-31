<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class VendedorController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id_producto', 'desc')
                     ->orderBy('descripcion', 'desc')
                     ->take(5)
                     ->get();
        return view('vendedor', compact('productos'));
    }

    protected $table = 'vendedor';
    public $timestamps = false;

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:vendedor,correo_vendedor',
            'contrasena' => 'required',
        ]);

        // Crea un nuevo vendedor
        Vendedor::create([
            'nombre_vendedor' => $request->nombre,
            'correo_vendedor' => $request->correo,
            'contrasena_vendedor' => $request->contrasena,
        ]);

        // Redirecciona a donde desees después de crear el vendedor
        return redirect()->route('/adminVen')->with('success', 'Vendedor creado exitosamente.');
    }
}
use App\Models\Vendedor;

