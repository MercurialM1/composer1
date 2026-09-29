<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderRequest;
use App\Models\Order;
use App\Services\AdminOrderService;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    /**
     * Функция отображения всех заказов в админке.
     * Отсортирована по последним заказам
     */
    public function index(): View
    {   //создаем переменную из таблицы с заказами и ЖАДНО загружаем пользователей и их товары
        $orders = Order::with('user', 'items.product')->latest()->get();
        //передаём переменную в view
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Функция обновления статуса заказа в админке
     */
    public function update(AdminOrderRequest $request, AdminOrderService $adminOrderService, int $id)
    {
        //получить id и статус заказа
        $adminOrderService->updateStatus($id, $request->validated()['status']);
        //вернуть ответ
        return response()->json(['success' => true]);
    }

    /**
     * Функция удаления заказа из админки
     */
    public function destroy(string $id,adminOrderService $adminOrderService)
    {
        //достать из сервиса супер пупер логику удаления
        $adminOrderService->deleteOrder($id);
        // вернутть json ответ
        return response()->json(['success' => true]);
    }
}
