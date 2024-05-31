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
            <div class="col-md-6 order-3 order-md-1" style=""> <img class="img-fluid d-block" src="/img/admin.png" style=""> </div>
            <div class="col-md-5 col-8 d-flex flex-column justify-content-center p-3 order-1 order-md-2" style="">
              <h3>Admin: {{ session('admin_nombre')}} </h3>
              <p>Encargado de sistema</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center" style="">
    <div class="container">
      <div class="row" style="">
        <div class="mx-auto col-lg-10">
          <h1>Creación de cuentas</h1>
          <div class="row">
            <div class="col-md-4 px-5 mt-3">
              <i class="d-block fa fa-user-circle fa-4x mb-3 text-dark"></i>
              <h4>Contador</h4>
              <a class="btn btn-dark" href="{{ url('/adminCon') }}">Ir</a>
            </div>
            <div class="col-md-4 px-5 mt-3"> <i class="d-block fa fa-user-circle fa-4x mb-3 text-dark" style=""></i>
              <h4>Bodeguero</h4>
              <a class="btn btn-outline-dark" href="{{ url('/adminBod') }}">Ir</a>
            </div>
            <div class="col-md-4 px-5 mt-3">
              <i class="d-block fa fa-user-circle fa-4x mb-3 text-dark"></i>
              <h4>Vendedor</h4>
              <a class="btn btn-dark" href="{{ url('/adminVen') }}">Ir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
</body>
</html>