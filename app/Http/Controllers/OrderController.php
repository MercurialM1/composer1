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
    public function index():View{
        $statuses = [
            'new' => 'Новый',
            'processing' => 'В обработке',
            'completed' => 'Завершён',
            'cancelled' => 'Отменён'
        ];
        $userId = Auth::id();
        $orders = Order::with('items')->where('user_id',$userId)->latest()->get();
        return view('client.orders.index',compact('orders','statuses'));
    }
  public function checkout()
  {
      $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->with('product')->get();
        if ($cartItems->isEmpty()) {//еслт пустая то редирект на магаз
            return redirect()->route('cabinet.shop');
        }
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);//расчёт суммы
      return view('client.cart.checkout', compact('total', 'cartItems'));
  }
    public function order(OrderItemRequest $request,CheckoutService $checkoutService){
        Auth::id();
        $order = $checkoutService->checkout(Auth::id(),$request->validated());
        if($order === null){
            return redirect()->route('cabinet.shop');
        }
        return redirect()->route('cabinet.shop')->with('success', 'Покупка');
    }
}
