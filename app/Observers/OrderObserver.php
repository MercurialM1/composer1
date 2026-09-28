<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {

    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->wasChanged('status') && $order->status === 'cancelled' ) {//проверка на изменение статуса
            foreach ($order->items as $item) {
                $item->product->increment('count',$item->quantity);//добавление если заказ отменён
            }
        }
    }
    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        foreach ($order->items as $item) {
            $item->product->increment('count',$item->quantity);
        }
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
