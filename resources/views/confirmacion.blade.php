<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="icon" href="/img/logo.png" type="image/x-icon">
    <title>Confirmación de Informe</title>
    <style>
        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            color: green;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="/img/logo.png" alt="Logo de la marca">
        </div>
        <a class="btn" href="{{ url('/inicio') }}"><button>Cerrar sesión</button></a>
    </header>

    <div class="container">
        <h1>Confirmación de Informe</h1>
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        <a href="{{ url('/vendedor') }}"><button>Volver a Vendedor</button></a>
    </div>

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
                    <a href="#" class="insta"><img src="/img/instagram.png" alt="logo instagram" class="redes"></a>
                    <a href="#" class="face"><img src="/img/facebook.png" alt="logo facebook" class="redes"></a>
                    <a href="#" class="twitter"><img src="/img/twitter.png" alt="logo twitter" class="redes"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2024 <b> Ferremas </b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>
</html>
