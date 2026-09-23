<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StatusMail;
use App\Models\Order;
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
    public function update(Request $request,$id){

        $request->validate([
           'status' => 'required|in:new,processing,cancelled,completed',
        ]);

        $order = Order::findOrFail($id);
        if($order->status == 'cancelled'){
            return redirect()->back()->with('error','«Фарш не провернуть назад, и мясо из котлет не восстановишь» - Пудге');
        }

        $order->status = $request->status;
        $order->save();
        if($order->user){
            $email = $order->user->email;
        Mail::to($email)->send(new StatusMail($order));
        }
        return redirect()->back()->with('success','Статус изменён');
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
        return redirect()->route('admin.order.index');
    }
}
