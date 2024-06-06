<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{
    public function createTransaction(Request $request)
    {
        $amount = $request->input('amount');
        $sessionId = uniqid();
        $buyOrder = uniqid();
        $returnUrl = route('transbank.callback');

        $transaction = (new Transaction)->create($buyOrder, $sessionId, $amount, $returnUrl);

        return redirect($transaction->getUrl() . '?token_ws=' . $transaction->getToken());
    }

    public function callback(Request $request)
    {
        $token = $request->input('token_ws');
        $transaction = (new Transaction)->commit($token);

        if ($transaction->isApproved()) {
            // Aquí puedes manejar el caso de pago exitoso, como actualizar el estado del pedido en tu base de datos
            return view('success', ['transaction' => $transaction]);
        } else {
            // Aquí puedes manejar el caso de pago rechazado
            return view('failure', ['transaction' => $transaction]);
        }
    }
}