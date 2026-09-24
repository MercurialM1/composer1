<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\CartItemRepository;


class CheckoutService
{
    private CartItemRepository $cartItemRepository;
    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }
    public function checkout(int $userId,array $validated): ?Order
    {
        $cartItems = $this->cartItemRepository->getByUserId($userId);
        if($cartItems->isEmpty()){
            return null;
        }
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);//расчёт суммы

        $order = Order::create(array_merge($validated,['user_id' => $userId,'total_price' => $total]));
        foreach ($cartItems as $cartItem) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'total_price' => $cartItem->product->price * $cartItem->quantity,
            ]);
        }
        //теперь это просто вызов команды из репозитория
        $this->cartItemRepository->deleteByUserId($userId);
        return $order;
    }

}
