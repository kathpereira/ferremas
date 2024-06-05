<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Exitoso</title>
</head>
<body>
    <h1>Pago Exitoso</h1>
    <p>El pago se ha realizado con éxito. Detalles de la transacción:</p>
    <ul>
        <li>ID de la Transacción: {{ $transaction->getBuyOrder() }}</li>
        <li>Monto: {{ $transaction->getAmount() }}</li>
        <li>Fecha: {{ $transaction->getTransactionDate() }}</li>
    </ul>
</body>
</html>