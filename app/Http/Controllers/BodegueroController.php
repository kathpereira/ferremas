<?php

namespace App\Http\Controllers;

use App\Models\Bodeguero;
use App\Models\Categoria;  // Importar la clase Categoria
use App\Models\Producto;  // Importar la clase Producto
use Illuminate\Http\Request;

class BodegueroController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        
        $query = Producto::query();

        // Filtrar por categoría si se proporciona
        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }

        // Filtrar por nombre si se proporciona
        if ($request->filled('nombre')) {
            $query->where('nombre_prod', 'like', '%' . $request->nombre . '%');
        }

        $productos = $query->get();

        return view('bodeguero', ['categorias' => $categorias, 'productos' => $productos]);
    }

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

        // Redirecciona después de crear el bodeguero
        return redirect()->route('bodeguero.index')->with('success', 'Bodeguero creado exitosamente.');
    }

    public function add(Request $request)
    {
        $producto = Producto::find($request->id_producto);
        if ($producto) {
            $producto->stock += $request->cantidad;
            $producto->save();
            return redirect()->route('bodeguero.index')->with('success', 'Stock actualizado exitosamente.');
        }
        return redirect()->route('bodeguero.index')->with('error', 'Producto no encontrado.');
    }

    public function remove(Request $request)
    {
        $producto = Producto::find($request->id_producto);
        if ($producto) {
            $producto->stock -= $request->cantidad;
            if ($producto->stock < 0) $producto->stock = 0;  // Asegurarse de que el stock no sea negativo
            $producto->save();
            return redirect()->route('bodeguero.index')->with('success', 'Stock actualizado exitosamente.');
        }
        return redirect()->route('bodeguero.index')->with('error', 'Producto no encontrado.');
    }
}

