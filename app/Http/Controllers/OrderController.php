<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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
    public function order(Request $request){
        $validated = $request->validate([
            'recipient_name' => 'required|string|min:2',
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:5',
            'comment' => 'nullable|string',
        ]);
        $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->with('product')->get();
        if($cartItems->isEmpty()){
            return redirect()->route('cabinet.shop');
        }
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $order = Order::create([
            'user_id' => $userId,
            'recipient_name' => $validated['recipient_name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'comment' => $validated['comment'],
            'total_price' => $total,
        ]);
        foreach ($cartItems as $cartItem) {
            $orderItem = OrderItem::create([
               'order_id' => $order->id,
               'product_id' => $cartItem->product_id,
               'quantity' => $cartItem->quantity,
               'total_price' => $cartItem->product->price * $cartItem->quantity,

            ]);
        }
        $cartItems = CartItem::where('user_id', $userId)->delete();
        return redirect()->route('cabinet.shop')->with('success', 'Покупка');
    }
}
