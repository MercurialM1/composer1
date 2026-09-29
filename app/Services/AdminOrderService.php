<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\AdminOrderRepository;

class AdminOrderService
{
    /**
     *Тут объявляется репозиторий для управления заказами
     */
    private $adminOrderRepository;
    public function __construct(AdminOrderRepository $adminOrderRepository)
    {
        $this->adminOrderRepository = $adminOrderRepository;
    }
    /**
     * Функция updateStatus создана для
     * изменения статуса закза
     *
     * Находит заказ по id из репозитория adminOrderRepository
     * Назначает ему новый статус
     * Сохраняет его
     * И возвращает
     *
     * Статус изменяется в таблице orders
     * в столбце status
     */
    public function updateStatus($id, string $newStatus): ?Order
    {
        //найти заказ по id
        $order = $this->adminOrderRepository->findOrder($id);
        //назначение нового статуса
        $order->status = $newStatus;
        //сохранить статус
        $order->save();
        //вернуть резульат
        return $order;
    }

    /**
     * Функция удаление заказа
     * Находит заказ из репозитория adminOrderRepository по id
     * И удаляет сначала связи потом уже сам заказ
     */
    public function deleteOrder($id)
    {   //Найти товар по id
        $order = $this->adminOrderRepository->findOrder($id);
        //Удаление
        $order->items()->delete();
        $order->delete();
    }
}
