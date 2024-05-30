<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{

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
