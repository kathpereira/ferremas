@extends('app')
@section('content')
<div class="container">
    <h1>Gestión de Stock</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="GET" action="{{ route('bodeguero.index') }}" class="form-inline mb-3">
        <div class="form-group mr-3">
            <label for="categoria" class="mr-2">Categoría:</label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre_cat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mr-3">
            <label for="nombre" class="mr-2">Buscar:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto" value="{{ request('nombre') }}">
            <button type="submit" class="btn btn-primary ml-2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre_prod }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>{{ $producto->categoria->nombre_cat }}</td>
                    <td>
                        <form action="{{ route('bodeguero.add') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                            <input type="number" name="cantidad" min="1" placeholder="Cantidad">
                            <button type="submit" class="btn btn-success">Sumar</button>
                        </form>
                        <form action="{{ route('bodeguero.remove') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                            <input type="number" name="cantidad" min="1" placeholder="Cantidad">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
