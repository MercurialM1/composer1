<?php

namespace App\Repositories;

use App\Models\Order;

class AdminOrderRepository
{
    public function findOrder(int $id): Order
    {
        return Order::with('user', 'items')->findOrFail($id);
    }

    /**
     * Это сам поиск который реализован в виде обращения к модели
     */
    public function searcher($query = null, $perPage = null, string $sortField = null, $direction = 'asc')
    {
        //если поисковой запрос не пустой тогда запускается сам поиск
        if (!empty($query)) {
            $orders = Order::search($query)
                ->query(fn($builder) => $builder
                    ->with(['user', 'items.product']))
                ->orderBy($sortField, $direction)
                ->paginate($perPage)
                ->withQueryString();

            return $orders;
        }
        //это если он пустой то просто вернуть с пагинацией
        return Order::with(['user', 'items.product'])
            ->orderBy($sortField, $direction)
            ->paginate($perPage);
    }


}
