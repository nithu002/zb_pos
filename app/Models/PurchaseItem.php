<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    //
    protected $fillable = [
        'purchase_id', 'product_id', 'qty',
        'purchase_price', 'discount', 'unit_cost', 'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    
}
