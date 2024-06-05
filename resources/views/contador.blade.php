<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
  <link rel="icon" href="/img/logo.png" type="image/x-icon">
  <title>Ferremas</title>
</head>

<body style="" class="">
<!--HEADER-->
<header class="header">
    <div class="logo">
        <img src="/img/logo.png" alt="Logo de la marca">
    </div>
    <a class="btn" method="POST" action="{{ route('logout') }}"><button type="button" onclick="cerrarSesion()">Cerrar sesión</button></a>
</header>

<div class="py-5 text-left bg-light" style="" >
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5" style="">
          <div class="row">
            <div class="col-md-6 order-3 order-md-1" style=""> <img class="img-fluid d-block" src="/img/contador.png" style=""> </div>
            <div class="col-md-5 col-8 d-flex flex-column justify-content-center p-3 order-1 order-md-2" style="">
              <h3>Contador: {{ session('nombre_cont')}} </h3>
              <p>Encargado de informes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-3 text-center">
    <div class="container">
      <div class="row" >
        <div class="mx-auto p-4 col-lg-7">
          <h1 class="mb-4">Generar informe</h1>
            <form id="informeForm" action="{{ route('contador.generateReport') }}" method="POST">
                @csrf
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
                        <textarea name="informe" id="informe" class="form-control" rows="4" placeholder="Escribe el informe aquí..." required></textarea>
                    </div>
                    <div class="alert alert-danger d-none" id="formError">Debe completar todos los campos.</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Enviar Informe</button>
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

<!-- SCRIPT PARA CERRAR SESIÓN -->
<script>
    // Función para enviar el formulario de cierre de sesión
    function cerrarSesion() {
        // Enviar una solicitud POST a la ruta de cierre de sesión
        fetch('{{ route('logout') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => {
            if (response.ok) {
                // Redireccionar a la página de inicio después de cerrar sesión
                window.location.href = '{{ url('/inicio') }}';
            }
        }).catch(error => {
            console.error('Error al cerrar sesión:', error);
        });
    }
</script>
