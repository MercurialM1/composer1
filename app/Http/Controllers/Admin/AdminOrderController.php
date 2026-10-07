<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOrderRequest;
use App\Models\Order;
use App\Repositories\AdminOrderRepository;
use App\Services\AdminOrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    protected $adminOrderRepository;

    public function __construct(AdminOrderRepository $adminOrderRepository)
    {
        $this->adminOrderRepository = $adminOrderRepository;
    }

    /**
     * Функция отображения всех заказов в админке.
     * Теперь добавлена функция поиска
     * Добавлена сортировка по id дате и сумме
     */
    public function index(Request $request): View
    {
        //защита от sql инъекции
        $sortable = ['id', 'total_price', 'created_at'];
        in_array($request->get('sort'), $sortable) ? $request->get('sort') : 'id';
        //поле сортировки по стандарту это id
        $sortField = $request->input('sort', 'id');
        //направления сортировки (по возрастанию и убыванию)
        $direction = $request->get('direction') === 'desc' ? 'desc' : 'asc';

        //пагинация на странице
        $perPage = $request->input('perPage');
        //поиск
        $query = $request->input('query');
        $orders = $this->adminOrderRepository->searcher($query, $perPage, $sortField, $direction);

        $orders->appends(request()->only(['query', 'perPage', 'sort', 'direction']));


        return view('admin.order.index', compact('orders', 'query', 'perPage', 'sortField', 'direction'));
    }

    /**
     * Функция обновления статуса заказа в админке
     */
    public function update(AdminOrderRequest $request, AdminOrderService $adminOrderService, int $id)
    {
        //получить id и статус заказа
        $adminOrderService->updateStatus($id, $request->validated()['status']);
        //вернуть ответ
        return response()->json(['success' => true]);
    }

    /**
     * Функция удаления заказа из админки
     */
    public function destroy(string $id, adminOrderService $adminOrderService)
    {
        //достать из сервиса супер пупер логику удаления
        $adminOrderService->deleteOrder($id);
        // вернутть json ответ
        return response()->json(['success' => true]);
    }
}
