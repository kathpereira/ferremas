<?php

namespace App\Http\Controllers;

use App\Models\Bodeguero;
use Illuminate\Http\Request;

class BodegueroController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'correo_bod' => 'required|email|unique:bodeguero',
            'contrasena' => 'required',
        ]);

        // Crea un nuevo bodeguero
        Bodeguero::create([
            'nombre_bod' => $request->nombre,
            'correo_bod' => $request->correo_bod,
            'contrasena_bod' => $request->contrasena,
        ]);

        // Redirecciona a donde desees después de crear el bodeguero
        return redirect()->route('/adminBod')->with('success', 'Bodeguero creado exitosamente.');
    }
}
