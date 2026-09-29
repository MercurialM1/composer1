<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Http\Requests\OrderItemRequest;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Функция отображения заказа
     * Объявляет возможные статусы
     * Присваивает в переменную авторизованного пользователя
     * Присваивает в переменную заказ самого челика с товарами
     * Возвращает в view прерменные для отображения
     * (само отображение не доделано)
     */
    public function index(): View
    {
        $statuses =
         [
            'new' => 'Новый',
            'processing' => 'В обработке',
            'completed' => 'Завершён',
            'cancelled' => 'Отменён'
        ];
        $userId = Auth::id();
        $orders = Order::with('items')->where('user_id', $userId)->latest()->get();
        return view('client.orders.index', compact('orders', 'statuses'));
    }
    /**
     * Функция подтверждение покупки
     * Проверяет авторизованного пользователя и записывает его id в переменную
     * Загружаем товары этого пользователя и записываем в переменную для передачи во view
     *Так же проверка на пустую корзину с редиректом что бы не покупать пустоту
     */
    public function checkout()
    {
        $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->with('product')->get();
        //если пустая - редирект на магаз
        if ($cartItems->isEmpty())
        {
            return redirect()->route('cabinet.shop');
        }
        return view('client.cart.checkout', compact( 'cartItems'));
    }
    /**
     * Функция заказа
     * Находит авторизованного пользователя
     * Создаёт заказ
     * Проверяет если товары в заказе
     * Если товар не null - редирект на магазин
     */
    public function order(OrderItemRequest $request, CheckoutService $checkoutService)
    {
        Auth::id();
        $order = $checkoutService->checkout(Auth::id(), $request->validated());
        // если корзина пустая тогда редирект на магаз
        if ($order === null)
        {
            return redirect()->route('cabinet.shop');
        }
        return redirect()->route('cabinet.shop')->with('success', 'Покупка');
    }
}
