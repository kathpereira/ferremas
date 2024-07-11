<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define las propiedades y métodos que necesitas
    protected $fillable = [
        'buy_order',
        'amount',
        'transaction_date',
        // otros campos relevantes
    ];

    public function getBuyOrder()
    {
        return $this->buy_order;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getTransactionDate()
    {
        return $this->transaction_date;
    }
}
