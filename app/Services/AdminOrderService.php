<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\AdminOrderRepository;

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
        //назначение нового статуса
        $order->status = $newStatus;
        //сохранить
        $order->save();
        return $order;
    }

    public function deleteOrder($id)
    {   //теперь товары возвращаются при удалении
        $order = $this->adminOrderRepository->findOrder($id);
        $order->items()->delete();
        $order->delete();
    }
}
