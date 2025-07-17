<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    //
    protected $table = 'purchase_items'; // make sure table name is correct

    protected $fillable = [
        'purchase_id', 'product_id', 'qty',
        'purchase_price', 'discount', 'unit_cost', 'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id',);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

}
