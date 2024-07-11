<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Transaction; // Asegúrate de que este import está presente

class InvoiceController extends Controller
{
    public function downloadInvoice($buyOrder)
    {
        $transaction = Transaction::where('buy_order', $buyOrder)->firstOrFail();

        $invoiceDetails = [
            'date' => $transaction->getTransactionDate(),
            'number' => $transaction->getBuyOrder(),
            'customer_name' => 'Nombre del Cliente',
            'customer_address' => 'Dirección del Cliente',
            'items' => [
                ['name' => 'Descripción del Producto', 'price' => $transaction->getAmount()]
            ],
            'total' => $transaction->getAmount()
        ];

        $pdf = PDF::loadView('invoice', compact('invoiceDetails'));
        return $pdf->download('boleta.pdf');
    }
}
