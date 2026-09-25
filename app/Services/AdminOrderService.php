<?php

namespace App\Services;

use App\Mail\cancelMail;
use App\Mail\finallMail;
use App\Mail\StatusProgressMail;
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
        $email = $order->user->email;
        //если заказ отменён вернуть нихуя i pismo
        if ($order->status == 'cancelled') {
            Mail::to($email)->send(new cancelMail($order));
        }//назначение нового статуса
        $order->status = $newStatus;
        //сохранить
        $order->save();
        //обьявить почту

        //пак писем заглушек
        if ($newStatus == 'processing') {
                Mail::to($email)->send(new StatusProgressMail($order));
        }
        if ($newStatus == 'completed') {
            Mail::to($email)->send(new finallMail($order));
        }


        return $order;


    }
}
