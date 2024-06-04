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

<div class="container" id="container">
<div class="form-container sign-in">
    <form action="{{ route('admin.iniciar_sesion') }}" method="POST">
    @csrf <!-- Token CSRF para protección -->
    <h1>Iniciar sesión</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <input type="email" name="correo_admin" placeholder="Correo"> 
        <input type="password" name="contrasena_admin" placeholder="Contraseña">
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
    <!--DISEÑO-->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                </div>
            </div>
        </div>
</div>
</body>
</html>