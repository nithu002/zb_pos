<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //

    protected $fillable = [
            'item_code',
            'product_name',
            'slug',
            'brand',
            'selling_type',
            'category',
            'sub_category',
            'quantity_alert',
            'wholesale_price',
            'online_price',
            'specialist',
            'manufacturer',
            'manufacturer_date',
            'expiry_date',
            'quantity',
            'buying_price',
            'selling_price',
            'discount_amount',
            'discount_percentage',
            'mark',
            'variantion_name',
            'variantion_value',
            'images',
            'location',
            'sku',
            'unit',
            'product_description',
            'product_type',
            'average_cost_price',
            'tax_type',
            'tax',
            'warranty',
            'supplier_id',
    ] ;


    public function cate(){
        return $this->belongsTo(Category::class,'category','','id');
    }

    public function supply(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    
}
