
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
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">

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
                                    <td><form action="{{route('admin.order.update',$order->id)}}" method="post" id="selectProgrammingLanguageForm">
                                            @csrf
                                            @method('PUT')
                                        <select  id="selectProgrammingLanguage" name="status">
                                        <option value="new" {{$order->status == 'new' ? 'selected' : ''}}>Новый</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>В обработке</option>
                                            <option value="completed" {{$order->status == 'completed' ? 'selected' : ''}}>Завершён</option>
                                            <option value="cancelled" {{$order->status == 'cancelled' ? 'selected' : ''}}>Отменён</option>
                                        </select>
                                            <button type="submit">Выбрать</button>

                                        </form>
                                    </td>

                                    <td>
                                        {{$order->total_price}}
                                    </td>
                                    <td>
                                        {{ $order->created_at?->format('d.m.Y H:i') }}
                                    </td>
                                    <td>
                                        <form action ="{{route('admin.order.destroy',$order->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit">удалить
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                        </table>
                    </div>
                </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</div>

