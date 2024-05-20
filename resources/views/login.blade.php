<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link rel="icon" href="/img/logo.png" type="image/x-icon">
  <title>Ferremas</title>
</head>

<body style="" class="">
<!--HEADER-->
    <header class="header">
        <div class="logo">
            <img src="/img/logo.png" alt="Logo de la marca">
        </div>
        <a class="btn" href="{{ url('/inicio') }}"><button>Volver inicio</button></a>
    </header>

<!--CONTAINER DE REGISTRO-->
<div class="container" id="container">
    <div class="form-container sign-up">
    <form method="POST" action="{{ route('registrar.cliente') }}">
    @csrf
    <h1>Crea tu cuenta</h1>
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido" placeholder="Apellido">
    <input type="tel" name="telefono" placeholder="Número de teléfono">
    <input type="text" name="direccion" placeholder="Dirección">
    <input type="email" name="correo" placeholder="Correo">
    <input type="password" name="contrasena" placeholder="Contraseña">
    <button type="submit">Registrar</button>
    </form>
    </div>
<!--CONTAINER DE INICIO SESIÓN-->
    <div class="form-container sign-in">
        <form>
            <h1>Iniciar sesión</h1>
            <input type="correo" placeholder="Correo">
            <input type="contrasena" placeholder="Contraseña">
            <a href="#">Olvidaste tu contraseña?</a>
            <button>Iniciar</button>
        </form>
    </div>
<!--IR A INICIO SESIÓN-->
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>¿Ya tienes una cuenta?</h1>
                <p>Ingrese sus datos personales para utilizar todas las funciones del sitio</p>
                <button class="hidden" id="login">Iniciar</button>
            </div>
<!--IR A REGISTRO-->
            <div class="toggle-panel toggle-right">
                <h1>¡Bienvenido a Ferremas!</h1>
                <p>Regístrese con sus datos personales para utilizar todas las funciones del sitio</p>
                <button class="hidden" id="register">Regístrate</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
