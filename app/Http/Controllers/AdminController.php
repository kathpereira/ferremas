<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Validation\ValidationException; // Agrega esta línea

class AdminController extends Controller
{
    public function mostrarFormularioInicioSesion()
    {
        return view('adminLogin');
    }
    
    public function iniciarSesion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo_admin' => 'required|email',
            'contrasena_admin' => 'required',
        ]);
    
        // Obtener el administrador por su correo
        $admin = Admin::where('correo_admin', $request->correo_admin)->first();
    
        // Si no se encuentra al administrador, mostrar un mensaje de error
        if (!$admin) {
            return back()->withErrors([
                'correo_admin' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput();
        }
    
        // Verificar la contraseña sin encriptar
        if ($request->contrasena_admin === $admin->contrasena_admin) {
            // Autenticación exitosa
            // Guardar la información del administrador en la sesión
            session()->put('admin_id', $admin->id_administrador);
            session()->put('admin_nombre', $admin->usuario_admin); // Guardar el nombre del administrador en la sesión
            return redirect('/adminInicio'); // Redireccionar al dashboard del administrador
        } else {
            // Autenticación fallida
            return back()->withErrors([
                'contrasena_admin' => 'La contraseña es incorrecta.',
            ])->withInput();
        }
    }
}
