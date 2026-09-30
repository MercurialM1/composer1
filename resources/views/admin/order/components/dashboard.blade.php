<div id="content" class="main-content">
        <div class="container">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Заказы</h4>
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
                                <table id="zero-config"
                                       class="table dt-table-hover" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Пользователь</th>
                                        <th>Товар</th>
                                        <th>Комментарий</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата</th>
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
                                                    <div>{{ $item->product->name }} ({{ $item->quantity }} шт)</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$order->comment}}
                                            </td>
                                            <td>
                                                <select class="status-select" data-order-id="{{ $order->id }}">
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
                                                        class="update-status-btn"
                                                        data-url="{{ route('admin.order.update', $order->id) }}">Выбрать
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
                                                        class="delete-order-btn"
                                                        data-url="{{route('admin.order.destroy',$order->id)}}">удалить
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                    <div class="modal-overlay" id="modal-overlay">
                                <div class="alert custom-alert-1 alert-dismissible mb-4"
                                     role="alert" id="modal-window">
                                    <div class="media">
                                        <div class="alert-icon">

                                        </div>
                                        <div class="media-body">
                                            <div class="alert-text">
                                                <strong>Подтвердите действие<br>Вы уверены, что хотите удалить заказ №
                                                </strong><span id="modal-order-id"></span>
                                            </div>
                                            <div class="alert-btn">
                                                <button type="button" class="btn btn-secondary"
                                                        id="modal-confirm-delete">Да
                                                </button>

                                                <button type="button" class="btn btn-secondary" id="modal-cancel">
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

