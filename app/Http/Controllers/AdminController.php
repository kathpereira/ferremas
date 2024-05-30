<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    // Función para mostrar el formulario de inicio de sesión
    public function mostrarFormularioInicioSesion()
    {
        return view('login'); // Asegúrate de tener una vista 'login' configurada
    }
    
    // Función para iniciar sesión
    public function iniciarSesion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo_admin' => 'required|email',
            'contrasena_admin' => 'required',
        ]);

        // Obtener las credenciales del formulario
        $credentials = $request->only('correo_admin', 'contrasena_admin');
        
        // Buscar al administrador por su correo
        $admin = Admin::where('correo_admin', $credentials['correo_admin'])->first();

        // Si no se encuentra al administrador, mostrar un mensaje de error
        if (!$admin) {
            return back()->withErrors([
                'correo_admin' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput(); // Devolver los valores del formulario
        }

        // Verificar la contraseña
        if ($credentials['contrasena_admin'] === $admin->contrasena_admin) {
            // Autenticación exitosa
            Auth::login($admin);
            return redirect()->intended('/admin'); // Redireccionar al dashboard del administrador
        } else {
            // Autenticación fallida
            return back()->withErrors([
                'contrasena_admin' => 'La contraseña es incorrecta.',
            ])->withInput(); // Devolver los valores del formulario
        }        
    }

    // Función para cerrar sesión
    public function cerrarSesion(Request $request)
    {
        Auth::logout(); // Cerrar la sesión actual del administrador
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token de sesión
        return redirect('/inicio'); // Redirigir a la página de inicio
    }

    public function mostrarFormularioCrearBodeguero()
    {
        return view('adminBod');
    }

    public function crearBodeguero(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:bodeguero|max:255',
            'contrasena' => 'required|string|min:6',
            // Puedes agregar aquí más reglas de validación según tus necesidades
        ]);

        // Crea un nuevo bodeguero
        Bodeguero::create([
            'nombre_bod' => $request->nombre,
            'correo_bod' => $request->correo,
            'contrasena_bod' => $request->contrasena,
            // Agrega aquí los demás campos del bodeguero
        ]);

        // Redirecciona a donde desees después de crear el bodeguero
        return redirect()->route('adminBod')->with('success', 'Bodeguero creado exitosamente.');
    }
}
