<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ferremas - Gestión de Stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link rel="icon" href="/img/logo.png" type="image/x-icon">
</head>
<body>
    <!--HEADER-->
    <header class="header">
        <div class="logo">
            <img src="/img/logo.png" alt="Logo de la marca">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Inicio</a></li>
                <li><a href="#about">Sobre nosotros</a></li>
                <li><a href="#footer">Contactanos</a></li>
            </ul>            
        </nav>
        <a class="btn" href="{{ url('/login') }}"><button>Iniciar sesión</button></a>
        <a class="btn" href="{{ url('/login') }}"><button>Regístrate</button></a>
    </header>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

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
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>