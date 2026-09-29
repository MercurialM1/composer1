<?php

namespace App\Observers;

use App\Mail\cancelMail;
use App\Mail\finallMail;
use App\Mail\StatusMail;
use App\Mail\StatusProgressMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Отправка письма после покупки
     *
     * Отправка подготовленного письма ему на почту после покупки
     *
     */
    public function created(Order $order): void
    {
        Mail::to($order->user->email)->send(new StatusMail($order));
    }

    /**
     *Отправка писем при изменении статуса заказа и возврат кол во товара при отмене
     *
     * Объявляется почта пользователя который сделал заказ
     * Проверяет были ли изменения статуса
     * и зависимости от статуса заказа ему отправляется заготовленное письмо
     * Для каждого статуса своё письмо
     *
     * если статус отменён тогда кол во товара возвращаются
     *
     * P.S
     * и кстати что забавно я это сделал,
     * но не сделал вычитание если убрать статус отменён обратно(я это только щас обнаружил и мне фпадлу это чинить)
     */
    public function updated(Order $order): void
    {
        $email = $order->user->email;
                //Проверка изменения статуса в таблице
        if ($order->isDirty('status'))
        {
            match ($order->status)
            {
                'canceled' => Mail::to($email)->send(new CancelMail($order)),
                'completed' => Mail::to($email)->send(new FinallMail($order)),
                'processing' => Mail::to($email)->send(new StatusProgressMail($order)),
            };
        }
                //проверка на изменение статуса
        if ($order->status == 'cancelled')
        {
            foreach ($order->items as $item)
            {
                // прибавляет кол во товара при удалении
                $item->product->increment('count', $item->quantity);
            }
        }
    }
    /**
     * После удаление заказа возвращает товар обратно
     * Тое добавляет количество товаров из заказа обратно в таблицу с товарами
     */
    public function deleted(Order $order): void
    {
        foreach ($order->items as $item)
        {
            $item->product->increment('count', $item->quantity);
        }
    }

}
