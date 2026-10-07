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
    public function searcher($query = null, $perPage = null, string $sortField = 'id', $direction = 'asc')
    {
        //если поисковой запрос не пустой тогда запускается сам поиск
        if (!empty($query)) {
            return Order::search($query)
                ->query(fn($builder) => $builder
                    ->with(['user', 'items.product'])
                    ->orderBy($sortField, $direction))
                ->paginate($perPage);
        }
        //это если он пустой то просто пернуть с пагинацией
        return Order::with(['user', 'items.product'])
            ->orderBy($sortField, $direction)
            ->paginate($perPage);
    }


}
