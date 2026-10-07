<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use Searchable;

    protected $fillable =[
        'user_id',
        'recipient_name',
        'phone',
        'address',
        'comment',
        'status',
        'total_price',
        'created_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');//заказ у одного пользователя по user_id
    }
    public function items(): HasMany{
        return $this->hasMany(OrderItem::class,'order_id'); //у каждего заказа есть свовй order id
    }

    /**
     * Я не знаю как правильно сформулировать
     * Крч это по каким таблицами искать и какие
     * результаты он будет возвращять в соответствии с таблицей
     * также загружает связь с таблицами user и product
     */
    #[SearchUsingFullText(['user','order_id','product_name','recipient_name', 'phone', 'address', 'comment', 'status', 'total_price'])]
    public function toSearchableArray(): array
    { //загрузка с других таблиц
        $this->loadMissing('items.product');
        $this->loadMissing('user');

        return [
            'user' => $this->user->name,
            'order_id' => $this->order_id,
            'product_name' => $this->items->pluck('product.name')->toArray(),
            'recipient_name' => $this->recipient_name,
            'comment' => $this->comment,
            'status' => $this->status,
            'total_price' => $this->total_price,
        ];
    }


}


