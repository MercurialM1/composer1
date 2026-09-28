<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderRequest;
use App\Models\Order;
use App\Services\AdminOrderService;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user', 'items.product')->latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function update(AdminOrderRequest $request, AdminOrderService $adminOrderService, int $id)
    {
        //получить id и статус заказа
        $order = $adminOrderService->updateStatus($id, $request->validated()['status']);

        return response()->json(['success' => true]);
    }

    public function show(): View
    {
        return view('admin.order.index');
    }

    public function destroy(string $id,adminOrderService $adminOrderService)
    {
        //достать из сервиса супер пупер логику удаления
        $adminOrderService->deleteOrder($id);
        // вернутть json ответ для ajax
        return response()->json(['success' => true]);
    }
}
