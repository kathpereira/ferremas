<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    // Función para mostrar el formulario de registro
    public function mostrarFormularioRegistro()
    {
        return view('auth.registro');
    }

    // Función para registrar un nuevo cliente
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
        $cliente->contrasena_cli = Hash::make($request->input('contrasena')); // Encripta la contraseña
        $cliente->save();

        // Redireccionar al formulario de inicio de sesión
        return redirect()->route('login')->with('success', 'Cliente registrado exitosamente. Por favor, inicia sesión.');
    }

    // Función para mostrar el formulario de inicio de sesión
    public function mostrarFormularioInicioSesion()
    {
        return view('login');
    }
    
    // Función para iniciar sesión
    public function iniciarSesion(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'correo_cli' => 'required|email',
        'contrasena_cli' => 'required',
    ]);

    // Obtener las credenciales del formulario
    $credentials = $request->only('correo_cli', 'contrasena_cli');
    
    // Buscar al usuario por su correo
    $usuario = Cliente::where('correo_cli', $credentials['correo_cli'])->first();

    // Si no se encuentra al usuario, mostrar un mensaje de error
    if (!$usuario) {
        return back()->withErrors([
            'correo_cli' => 'Las credenciales proporcionadas son incorrectas.',
        ])->withInput(); // Devolver los valores del formulario
    }

    // Verificar la contraseña
    if (Hash::check($credentials['contrasena_cli'], $usuario->contrasena_cli)) {
        // Autenticación exitosa
        Auth::login($usuario);
        return redirect()->intended('/cliente'); // Redireccionar a la página de inicio
    } else {
        // Autenticación fallida
        return back()->withErrors([
            'contrasena_cli' => 'La contraseña es incorrecta.',
        ])->withInput(); // Devolver los valores del formulario
    }
}

    // Función para cerrar sesión
    public function cerrarSesion(Request $request)
    {
        Auth::logout(); // Cerrar la sesión actual del usuario
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token de sesión
        return redirect('/inicio'); // Redirigir a la página de inicio
    }
}
