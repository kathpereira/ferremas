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
<!--FOOTER-->
<footer class="pie-pagina" id="footer">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="/img/logo.png" alt="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>CONTACTANOS</h2>
            <p>Avenida Libertador Bernardo O'higgins, 1905, Santiago Centro</p>
            <p>+56 9 2232 6206</p>
            <p>ferremas@gmail.com</p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="red-social">
                <a href="#" class="insta"><img src="/img/instagram.png" alt="logo instagram"
                        class="redes"></a>
                <a href="#" class="face"><img src="/img/facebook.png" alt="logo facebook"
                        class="redes"></a>
                <a href="#" class="twitter"><img src="/img/twitter.png" alt="logo twitter"
                        class="redes"></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2024 <b> Ferremas </b> - Todos los Derechos Reservados.</small>
    </div>
</footer>

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


</body>
</html>
