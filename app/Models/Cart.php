<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'discount_type',
        'discount',
        'net_price',
        'main_sub_total',
        'main_discount',
        'main_total',
    ];
    protected $casts = [
        'quantity' => 'integer',
        'discount' => 'decimal:2',
        'net_price' => 'decimal:2',
        'main_sub_total' => 'decimal:2',
        'main_discount' => 'decimal:2',
        'main_total' => 'decimal:2',
    ];
}
