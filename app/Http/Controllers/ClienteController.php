<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function registrarCliente(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email|unique:cliente,correo_cli',
            'contrasena' => 'required|min:6',
        ]);

        // Crea un nuevo cliente
        $cliente = new Cliente();
        $cliente->nombre_cli = $request->input('nombre');
        $cliente->apellido_cli = $request->input('apellido');
        $cliente->telefono_cli = $request->input('telefono');
        $cliente->direccion_cli = $request->input('direccion');
        $cliente->correo_cli = $request->input('correo');
        $cliente->contrasena_cli = $request->input('contrasena'); // No se encripta la contraseña
        $cliente->save();

        // Redireccionar a una página de éxito o mostrar un mensaje
        return redirect()->route('formulario.registro')->with('success', 'Cliente registrado exitosamente');
    }
}
