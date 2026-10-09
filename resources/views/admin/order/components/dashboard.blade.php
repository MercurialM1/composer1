<div id="content" class="main-content">
    <div class="container">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Заказы</h4>
                    </div>
                </div>
                <div class="widget-content widget-content-area br-8">
                    <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="dt--top-section">
                            <div class="row">
                                <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                    <div class="dataTables_length" id="zero-config_length">
                                        <form action="{{ route('admin.order.index') }}" method="GET"
                                              class="d-flex align-items-center gap-2">
                                            @if(request('query'))
                                                <input type="hidden" name="query" value="{{ request('query') }}">
                                            @endif
                                            <input type="hidden" name="sortField" value="{{ request('sortField', 'id') }}">
                                            <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">
                                                <input type="hidden" name="page" value="1">

                                            <label>Показывать:
                                                <select name="perPage" class="form-control" onchange="this.form.submit()">
                                                    <option value="7" {{ request('perPage') == 7 ? 'selected' : '' }}>7</option>
                                                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                                                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                                                </select>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div
                                    class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                    <div id="zero-config_filter" class="dataTables_filter">
                                        <form action="{{ route('admin.order.index') }}" method="GET"
                                              class="d-flex align-items-center gap-2">
                                            <input type="hidden" name="sortField" value="{{ request('sortField', 'id') }}">
                                            <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">
                                            @if(request('perPage'))
                                                <input type="hidden" name="perPage" value="{{ request('perPage') }}">
                                            @endif
                                            <input type="hidden" name="page" value="1">

                                            <label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                                <input type="search" name="query" value="{{ request('query') }}"
                                                       class="form-control" placeholder="Поиск...">
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-warning">
                                        {{session('error')}}
                                    </div>
                                @endif
                                @if($orders->count() > 0)
                                    <div class="table-responsive">
                                        <table id="zero-config" class="table dt-table-hover dataTable no-footer"
                                               style="width:100%">
                                            <thead>
                                            <tr role="row">
                                                <th>
                                                    <a href="{{route('admin.order.index',['query'=>request('query'),'sortField'=>'id','direction' => ($direction === 'asc' && $sortField === 'id') ? 'desc' : 'asc','perPage' => request('perPage'),'page' => request('page')])}}">
                                                        ID
                                                        @if($sortField === 'id')
                                                            {!! $direction === 'asc' ? '&#9650;' : '&#9660;' !!}
                                                        @endif
                                                    </a>
                                                </th>
                                                <th>Пользователь</th>
                                                <th>Товар</th>
                                                <th>Комментарий</th>
                                                <th>Статус</th>
                                                <th>
                                                    <a href="{{route('admin.order.index',['query'=>request('query'),'sortField'=>'total_price','direction' => ($direction === 'asc' && $sortField === 'total_price') ? 'desc' : 'asc','perPage' => request('perPage'),'page' => request('page')])}}">
                                                        Сумма
                                                    @if($sortField === 'total_price')
                                                        {!! $direction === 'asc' ? '&#9650;' : '&#9660;' !!}
                                                    @endif
                                                </th>
                                                <th>
                                                    <a href="{{route('admin.order.index',['query'=>request('query'),'sortField'=>'created_at','direction' => ($direction === 'asc' && $sortField === 'created_at') ? 'desc' : 'asc','perPage' => request('perPage'),'page' => request('page')])}}">
                                                        Дата
                                                    @if($sortField === 'created_at')
                                                        {!! $direction === 'asc' ? '&#9650;' : '&#9660;' !!}
                                                    @endif</th>
                                                <th>Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>
                                                        {{$order->id}}
                                                    </td>
                                                    <td>
                                                        <div>{{$order->user->name}}<br> {{$order->recipient_name}}</div>
                                                    </td>
                                                    <td>
                                                        @foreach($order->items as $item)
                                                            <div>{{ $item->product->name }} ({{ $item->quantity }}шт)
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{$order->comment}}
                                                    </td>
                                                    <td>
                                                        <select class="status-select form-select form-select-sm"
                                                                aria-label=".form-select-sm example"
                                                                data-order-id="{{ $order->id }}" style="width: 143px;">
                                                            <option
                                                                value="new" {{ $order->status == 'new' ? 'selected' : '' }}>
                                                                Новый
                                                            </option>
                                                            <option
                                                                value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                                В обработке
                                                            </option>
                                                            <option
                                                                value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                                Завершён
                                                            </option>
                                                            <option
                                                                value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                                Отменён
                                                            </option>
                                                        </select>
                                                        <button type="button"
                                                                class="update-status-btn btn btn-primary"
                                                                data-url="{{ route('admin.order.update', $order->id) }}"
                                                                style="width: 143px;">Выбрать
                                                        </button>
                                                    </td>
                                                    <td>
                                                        {{$order->total_price}}
                                                    </td>
                                                    <td>
                                                        {{ $order->created_at?->format('d.m.Y H:i') }}
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="delete-order-btn btn btn-danger btn-rounded mb-2 me-4"
                                                                data-url="{{route('admin.order.destroy',$order->id)}}">
                                                            удалить
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                        @endif
                                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                                            <div class="dt--pages-count mb-sm-0 mb-3">
                                                <div class="dataTables_info" role="status" aria-live="polite">
                                                    Показано {{ $orders->firstItem() }}–{{ $orders->lastItem() }} из {{ $orders->total() }}
                                                </div>
                                            </div>
                                            <div class="dt--pagination">
                                                {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-overlay" id="modal-overlay">
                                        <div class="alert custom-alert-1 alert-dismissible mb-4"
                                             role="alert" id="modal-window">
                                            <div class="media">
                                                <div class="alert-icon">

                                                </div>
                                                <div class="media-body">
                                                    <div class="alert-text">
                                                        <strong>Подтвердите действие<br>Вы уверены, что хотите удалить
                                                            заказ №
                                                        </strong><span id="modal-order-id"></span>
                                                    </div>
                                                    <div class="alert-btn">
                                                        <button type="button" class="btn btn-secondary"
                                                                id="modal-confirm-delete">Да
                                                        </button>

                                                        <button type="button" class="btn btn-secondary"
                                                                id="modal-cancel">
                                                            Отмена
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <script>
                                //сссылкт на кнопки с html
                                const modalOverlay = document.getElementById('modal-overlay');
                                const modalDelete = document.getElementById('modal-confirm-delete')
                                const modalCancel = document.getElementById('modal-cancel')
                                const modalOrderId = document.getElementById('modal-order-id')
                                //значение кнопки и ссылки по стандарту можно менять потому что let
                                let deleteUrl = null;
                                let deleteButton = null;
                                //найти селектор точнее кнопку выбора
                                const updateButtons = document.querySelectorAll('.update-status-btn')
                                //отслеживание нажатия на селектор
                                updateButtons.forEach(function (button) {
                                    button.addEventListener('click', function () {
                                        const select = button.closest('td').querySelector('.status-select')
                                        // новый статус с селектора
                                        const newStatus = select.value
                                        //csrf
                                        const token = document.querySelector('meta[name="csrf-token"]').content;
                                        // типо сам ajax
                                        fetch(button.dataset.url, {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': token,
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                            },//снизу чото типо какая то подмена (без неё нихуя не работало)
                                            body: new URLSearchParams({
                                                _method: 'PUT',
                                                status: newStatus
                                            })
                                        })
                                            //подсветка при изменении
                                            .then(function (response) {
                                                //если ответ 200 тогда вруби на 2 сек зелёный цвет
                                                console.log('otvet:', response.status);
                                                if (response.ok) {
                                                    select.style.backgroundColor = '#90EE90'
                                                    setTimeout(function () {
                                                        select.style.backgroundColor = '';
                                                    }, 2000);

                                                }

                                            });
                                    })
                                })
                                //кнопка отмена
                                modalCancel.addEventListener('click', function () {
                                    //не отображать
                                    modalOverlay.style.display = 'none';
                                })
                                //кнопка удалить
                                modalDelete.addEventListener('click', function () {
                                    modalOverlay.style.display = 'none';
                                    //аля csrf
                                    const token = document.querySelector('meta[name="csrf-token"]').content;
                                    //принимает url
                                    fetch(deleteUrl, {
                                        //кофиг метода
                                        method: 'DELETE',
                                        //токен csrf и тип даннх
                                        headers: {
                                            'X-CSRF-TOKEN': token,
                                            'Accept': 'application/json',
                                        }
                                    })//для проверки в консоли
                                        .then(function (response) {
                                            console.log('otvet:', response.status);
                                            if (response.ok) {
                                                const tr = deleteButton.closest("tr")
                                                tr.remove();
                                            }
                                        });
                                });
                                //найти кнопку по классу
                                const buttons = document.querySelectorAll('.delete-order-btn');
                                //проверить кнопку на нажатие
                                buttons.forEach(function (button) {
                                    button.addEventListener('click', function () {
                                        //показать окно подтверждения
                                        modalOverlay.style.display = 'flex';
                                        //вытащитть id заказа последный элемент показывает там id в ссылке
                                        const orderId = button.dataset.url.split('/').pop();
                                        modalOrderId.textContent = orderId;
                                        //переназначить кнопку и url
                                        deleteUrl = button.dataset.url
                                        deleteButton = button
                                    })
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

