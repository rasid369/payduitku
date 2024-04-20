<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class callback extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchantCode',
        'amount',
        'merchantOrderId',
        'productDetail',
        'additionalParam',
        'paymentCode',
        'resultCode',
        'merchantUserId',
        'reference',
        'signature',
        'publisherOrderId',
        'spUserHash',
        'settlementDate',
        'issuerCode',
    ];
}
