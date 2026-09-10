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

    public function categories()
    {
        return $this->belongsToMany(CategoryShop::class,'category_product','product_id','category_id');
    }
}
