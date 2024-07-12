<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Hash;

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

        // Crea un nuevo vendedor con la contraseña encriptada
        Vendedor::create([
            'nombre_vendedor' => $request->nombre,
            'correo_vendedor' => $request->correo,
            'contrasena_vendedor' => Hash::make($request->contrasena), // Encriptar la contraseña
        ]);

        // Redirecciona a donde desees después de crear el vendedor
        return redirect()->back()->with('Vendedor creado exitosamente.');
        //usarlo en caso de que la ruta asignada no funcione
        //return redirect()->route('adminVen')->with('success', 'Vendedor creado exitosamente.');
    }

    public function iniciarSesion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo_vendedor' => 'required|email',
            'contrasena_vendedor' => 'required',
        ]);
    
        $vendedor = Vendedor::where('correo_vendedor', $request->correo_vendedor)->first();
    
        if (!$vendedor) {
            return back()->withErrors([
                'correo_vendedor' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput();
        }
    
        // Verificar la contraseña encriptada
        if (Hash::check($request->contrasena_vendedor, $vendedor->contrasena_vendedor)) {
            // Autenticación exitosa
            // Guardar la información del vendedor en la sesión
            session()->put('id_vendedor', $vendedor->id_vendedor);
            session()->put('nombre_vendedor', $vendedor->nombre_vendedor); 
            return redirect('/vendedor'); 
        } else {
            // Autenticación fallida
            return back()->withErrors([
                'contrasena_vendedor' => 'La contraseña es incorrecta.',
            ])->withInput();
        }
    }   
}
