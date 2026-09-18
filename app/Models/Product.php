<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{

    use HasFactory;
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
