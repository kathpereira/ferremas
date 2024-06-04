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
