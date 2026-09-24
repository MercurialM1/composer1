<?php

namespace App\Services;

use App\Mail\StatusMail;
use App\Models\Order;
use App\Repositories\AdminOrderRepository;
use Illuminate\Support\Facades\Mail;

class AdminOrderService
{
    private $adminOrderRepository;

    public function __construct(AdminOrderRepository $adminOrderRepository)
    {
        $this->adminOrderRepository = $adminOrderRepository;
    }

    public function updateStatus($id, string $newStatus): ?Order
    {
        //найти заказ
        $order = $this->adminOrderRepository->findOrder($id);
        //если заказ отменён вернуть нихуя
        if ($order->status == 'cancelled') {
            return null;
        }//назначение нового статуса
        $order->status = $newStatus;
        //сохранить
        $order->save();
        //обьявить почту
        $email = $order->user->email;
        //пак писем заглушек
        if ($newStatus == 'processing') {

            Mail::raw("Ваш заказ в статусе {$newStatus}", function ($message) use ($email) {
                $message->to($email);
            });
        }
        if ($newStatus == 'completed') {
            Mail::raw("Ваш заказ был доставлен {$newStatus}", function ($message) use ($email) {
                $message->to($email);
            });
        }


        return $order;


    }
}
