<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'count',
        'image',
        'description',
        'price',
        'delivery',
        'sort',
        'is_active',

    ];

    public function CategoryShops()
    {
        return $this->belongsToMany(CategoryShop::class,'category_product');
    }
}
