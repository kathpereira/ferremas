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
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#informeModal">Generar Informe</button>
        </div>
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
                <i class="fas fa-search"></i>
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

<!-- Modal para Generar Informe -->
<div class="modal fade" id="informeModal" tabindex="-1" role="dialog" aria-labelledby="informeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="informeForm" action="{{ route('bodeguero.generateReport') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="informeModalLabel">Generar Informe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formato">Formato</label>
                        <select name="formato" id="formato" class="form-control" required>
                            <option value="">Seleccione un formato</option>
                            <option value="PDF">PDF</option>
                            <option value="Word">Word</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de Envío</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="informe">Informe</label>
                        <textarea name="informe" id="informe" class="form-control" rows="4" placeholder="Escribe el informe aquí..." required></textarea>
                    </div>
                    <div class="alert alert-danger d-none" id="formError">Debe completar todos los campos.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar Informe</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('informeForm').addEventListener('submit', function(event) {
    const formato = document.getElementById('formato').value;
    const fecha = document.getElementById('fecha').value;
    const informe = document.getElementById('informe').value;
    if (!formato || !fecha || !informe) {
        event.preventDefault();  // Previene el envío del formulario
        document.getElementById('formError').classList.remove('d-none');  // Muestra el mensaje de error
    }
});
</script>

@endsection
