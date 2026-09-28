<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\CartItemRepository;
use App\Repositories\OrderRepository;


class CheckoutService
{
    private OrderRepository $orderRepository;
    private CartItemRepository $cartItemRepository;
    public function __construct(CartItemRepository $cartItemRepository,OrderRepository $orderRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->orderRepository = $orderRepository;
    }
    public function checkout(int $userId,array $validated): ?Order
    {
        $cartItems = $this->cartItemRepository->getByUserId($userId);
        if($cartItems->isEmpty()){
            return null;
        }
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);//расчёт суммы
        $order = $this->orderRepository->createOrder($userId,$validated,$total);
        foreach ($cartItems as $cartItem){
            $itemTotalPrice = $cartItem->product->price * $cartItem->quantity;

            $this->orderRepository->createOrderItem(
                $order,
                $cartItem->product_id,
                $cartItem->quantity,
                $itemTotalPrice
            );
        }

        //теперь это просто вызов команды из репозитория
        $this->cartItemRepository->deleteByUserId($userId);
        return $order;
    }

}
