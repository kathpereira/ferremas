<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
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
<!--cards-->
<div class="container mt-5">
        <h1 class="mb-4">Catálogo de Productos</h1>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($producto->imagen)
                            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        @else
                            <img src="default-image.jpg" class="card-img-top" alt="{{ $producto->nombre }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre_prod }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            <div class="item">
                <span class="titulo-item">Balde pintura amarillo</span>
                <img src="/img/baldeamarillo.jpg" alt="" class="img-item">
                <span class="precio-item">$15.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Balde pintura azul</span>
                <img src="/img/baldeazul.jpg" alt="" class="img-item">
                <span class="precio-item">$25.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Tornillo</span>
                <img src="/img/tornillo.jpg" alt="" class="img-item">
                <span class="precio-item">$35.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Taladro</span>
                <img src="/img/taladro.jpg" alt="" class="img-item">
                <span class="precio-item">$18.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Martillo</span>
                <img src="/img/martillo.jpg" alt="" class="img-item">
                <span class="precio-item">$32.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Destornillador</span>
                <img src="/img/destornillador.jpg" alt="" class="img-item">
                <span class="precio-item">$18.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Llave inglesa</span>
                <img src="/img/llaveing.jpg" alt="" class="img-item">
                <span class="precio-item">$54.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Alicate</span>
                <img src="/img/alicate.jpg" alt="" class="img-item">
                <span class="precio-item">$32.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>
            <div class="carrito-items">
            </div>
            <!-- Indica el total -->
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa fa-shopping-bag" aria-hidden="true"></i></i> </button>
            </div>
        </div>
    </section>
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

<script src="/js/carrito.js"></script>
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