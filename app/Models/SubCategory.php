<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //


    protected $table = "sub_categories";


    protected $fillable = [
        'name',
        'cat_id',
        'subcategory',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id','id');
    }
}
