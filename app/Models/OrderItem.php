<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function order(): BelongsTo
    {
       return $this->belongsTo(Order::class,'order_id'); //у заказа есть свой id
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');// одна позиция в заказе один product_id
    }
}
