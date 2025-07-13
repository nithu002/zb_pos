<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = ['name', 'contact_person', 'phone', 'creat_by',];

    public function products()
    {
        return $this->hasMany(Product::class, 'location', 'name'); // If you keep 'location' column in products table
    }
}
