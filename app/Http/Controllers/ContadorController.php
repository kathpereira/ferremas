<?php
namespace App\Http\Controllers;

use App\Models\Contador;
use Illuminate\Http\Request;

class ContadorController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_cont' => 'required',
            'correo_cont' => 'required|email|unique:contador',
            'contrasena_cont' => 'required',
        ]);

        // Crea un nuevo contador
        Contador::create([
            'nombre_cont' => $request->nombre_cont,
            'correo_cont' => $request->correo_cont,
            'contrasena_cont' => $request->contrasena_cont,
        ]);

        // Redirecciona a donde desees después de crear el contador
        return redirect()->route('adminCon')->with('success', 'Contador creado exitosamente.');
    }
}
