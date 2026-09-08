<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class CategoryShop extends Model
{

    public $timestamps = false;
    protected $table = 'productcategories';
    protected $fillable = [
        'name',
        'sort',
        'is_active',
    ];


    public function Products()
    {
        return $this->belongsToMany(Product::class,'category_product');
    }
}
