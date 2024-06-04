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

    public function iniciarSesion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo_cont' => 'required|email',
            'contrasena_cont' => 'required',
        ]);
    
        $contador = Contador::where('correo_cont', $request->correo_cont)->first();
    
        if (!$contador) {
            return back()->withErrors([
                'correo_cont' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput();
        }
    
        // Verificar la contraseña sin encriptar
        if ($request->contrasena_cont === $contador->contrasena_cont) {
            // Autenticación exitosa
            // Guardar la información del contador en la sesión
            session()->put('id_contador', $contador->id_contador);
            session()->put('nombre_cont', $contador->nombre_cont); 
            return redirect('/contador'); 
        } else {
            // Autenticación fallida
            return back()->withErrors([
                'contrasena_cont' => 'La contraseña es incorrecta.',
            ])->withInput();
        }
    }
}
