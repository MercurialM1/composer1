<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderRequest;
use App\Mail\StatusMail;
use App\Models\Order;
use App\Services\AdminOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index() :View
    {
        $orders = Order::with('user','items.product')->latest()->get();
        return view('admin.order.index', compact('orders' ));
    }
    public function update(AdminOrderRequest $request, AdminOrderService $adminOrderService,int $id)
    {

        //получить id и статус заказа
        $order = $adminOrderService->updateStatus($id, $request->validated()['status']);
        //(заказ считается null если он отменён) если заказ отменён то сделать редирект с сообщением
        if ($order === null) {
            return redirect()->back()->with('error', '«Фарш не провернуть назад, и мясо из котлет не восстановишь» - Пудге');
        }
        //редирект с сообщением
        return response()->json(['success' => true]);
    }
    public function show():View
    {
        return view('admin.order.index');
    }
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();
        // вернутть json ответ для ajax
        return response()->json(['success' => true]);
    }
}
