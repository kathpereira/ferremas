<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todas las categorías
        $categorias = Categoria::all();
        
        // Obtener los productos filtrados por categoría si se selecciona una categoría
        $productos = Producto::query();

        if ($request->has('categoria') && $request->categoria != '') {
            $productos = $productos->where('id_categoria', $request->categoria);
        }

        $productos = $productos->get();

        return view('catalogo', compact('productos', 'categorias'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();

        // Validar y manejar la subida de la imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('img', 'public'); // Guarda en storage/app/public/img
            $producto->imagen = 'storage/' . $path;
        }

        $producto->nombre_prod = $request->input('nombre_prod');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->marca = $request->input('marca');
        $producto->id_categoria = $request->input('id_categoria');

        $producto->save();

        return redirect()->route('productos.index');
    }
}
