<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\CartItemRepository;
use App\Repositories\OrderRepository;


class CheckoutService
{
    /**
     * Объявление репозиториев заказов и корзины
     */
    private OrderRepository $orderRepository;
    private CartItemRepository $cartItemRepository;
    public function __construct(CartItemRepository $cartItemRepository,OrderRepository $orderRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Функция создания заказа
     *
     * Находит данные корзины и проверяет её на наличие товаров
     * Если товаров нет - вернуть null (в контроллере проверка на null c редиректом)
     * Если товар есть - рассчитать сумму
     * Далее создание самого заказа
     * После создания очистка самой корзины, что бы корзина опустошалась
     * Вернуть готовый заказ
     *
     */
    public function checkout(int $userId,array $validated): ?Order
    {   //корзина челика
        $cartItems = $this->cartItemRepository->getByUserId($userId);
        //проверка на пустую корзину
        if($cartItems->isEmpty())
        {
            return null;
        }
        //расчет суммы ценник на количество
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        //создание заказа
        $order = $this->orderRepository->createOrder($userId,$validated,$total);
        foreach ($cartItems as $cartItem)
        {

            $this->orderRepository->createOrderItem
            (
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
