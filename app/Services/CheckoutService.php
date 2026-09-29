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
    {   //корзина челика
        $cartItems = $this->cartItemRepository->getByUserId($userId);
        //проверка на пустую корзину
        if($cartItems->isEmpty()){
            return null;
        }
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);//расчёт суммы
        //создание заказа
        $order = $this->orderRepository->createOrder($userId,$validated,$total);
        foreach ($cartItems as $cartItem){

            $this->orderRepository->createOrderItem(
                $order,
                $cartItem->product_id,
                $cartItem->quantity,
                $total
            );
        }

        //удалить корзину
        $this->cartItemRepository->deleteByUserId($userId);
        return $order;
    }

}
