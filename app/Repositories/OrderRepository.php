<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository
{
    public function createOrder($userId,$validated,$total)
    {
        $order = Order::create(array_merge($validated,['user_id' => $userId,'total_price' => $total]));
        return $order;
    }

    public function createOrderItem($order,$productId,$quantity,$totalPrice):   void
    {
        OrderItem::create
        ([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);
    }
}
