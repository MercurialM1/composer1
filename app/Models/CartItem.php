<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function product(){//многие к одному / одна позиция корзины к одному конкретному товару по product_id ёпта так же с пользователем и корзиной
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
