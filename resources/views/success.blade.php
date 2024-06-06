<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link rel="icon" href="/img/logo.png" type="image/x-icon">
  <title>Pago Exitoso</title>
</head>

<body style="" class="">
<!--HEADER-->
    <header class="header">
        <div class="logo">
            <img src="/img/logo.png" alt="Logo de la marca">
        </div>
        <a class="btn" href="{{ url('/inicio') }}"><button>Volver inicio</button></a>
    </header>
    <style>
        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            width: 100%;
            margin-top: 20px;
        }
        p, li {
            padding: 10px;
            text-align: left;
        }
    </style>
<div class="container">
    <h1>Pago Exitoso</h1>
    <p>El pago se ha realizado con éxito. Detalles de la transacción:</p>
    <ul>
        <li>ID de la Transacción: {{ $transaction->getBuyOrder() }}</li>
        <li>Monto: {{ $transaction->getAmount() }}</li>
        <li>Fecha: {{ $transaction->getTransactionDate() }}</li>
    </ul>
<div>
</body>
</html>