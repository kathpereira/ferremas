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
    <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"> </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"> </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active"> <img class="d-block img-fluid w-100" src="/img/banner1.jpg" >
                <div class="carousel-caption">
                </div>
              </div>
              <div class="carousel-item "> <img class="d-block img-fluid w-100" src="/img/banner2.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="/img/banner3.jpg">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center text-md-right" id="about" style="background-image: url(/img/nosotros.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9" style="background-color: white;">
          <h3 class="display-3 text-dark" style="">Sobre nosotros</h3>
          <p>En FERREMAS ofrecemos una amplia gama de productos para brindar un servicio eficiente y de calidad que van desde herramientas manuales y eléctricas, pinturas, materiales eléctricos, hasta accesorios y artículos de seguridad. Estamos comprometidos a contribuir al éxito de proyectos de construcción en todo el país.</p>
          <p>¡Bienvenidos a FERREMAS, su aliado en la construcción!</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center" style="" >
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-12">
          <h1 class="mb-3" style=""><b>Marcas</b></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-lg-3 p-4" style=""> <img class="img-fluid d-block mb-3 mx-auto py-1" src="/img/bosch.png" width="100" alt="Card image cap" style="">
          <h4 class="py-4" style=""> <b>Bosch</b></h4>
        </div>
        <div class="col-6 col-lg-3 p-4" style=""> <img class="img-fluid d-block mb-3 mx-auto py-3" src="/img/makita.png" width="180" alt="Card image cap" style="">
          <h4 class="py-4" style=""> <b>Makita</b></h4>
        </div>
        <div class="col-6 col-lg-3 p-4"> <img class="img-fluid d-block mb-3 mx-auto" src="/img/stanley.png" width="160" style="">
          <h4 class="py-3"> <b>Stanley</b></h4>
        </div>
        <div class="col-6 col-lg-3 p-4"> <img class="img-fluid d-block mb-3 mx-auto py-2" src="/img/sika.png" width="100">
          <h4 class="py-4"> <b>Sika</b></h4>
        </div>
      </div>
    </div>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>