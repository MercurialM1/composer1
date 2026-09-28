<?php

namespace App\Repositories;

use App\Models\Order;

class AdminOrderRepository
{
    public function findOrder(int $id): Order
    {
        return Order::with('user','items')->findOrFail($id);
    }

}
