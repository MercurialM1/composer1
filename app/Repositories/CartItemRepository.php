<?php

namespace App\Repositories;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
class CartItemRepository
{
    public function getByUserId(int $userId): Collection//корзина приколиста теперь тут
    {
        return CartItem::where('user_id', $userId)->with('product')->get();
    }

    public function deleteByUserId(int $userId): void//удались по пользователю
    {
        CartItem::where('user_id', $userId)->delete();
    }
}
