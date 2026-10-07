
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
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">

                                    <thead>

                                    <tr>
                                        <th>Номер заказа</th>
                                        <th>Имя</th>
                                        <th>Товар</th>
                                        <th>Комментарий</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата</th>
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
                                                {{$statuses[$order->status]}}
                                            </td>
                                            <td>
                                                {{$order->total_price}}
                                            </td>
                                            <td>
                                                {{ $order->created_at?->format('d.m.Y H:i') }}
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
<script src="{{asset('src/plugins/src/table/datatable/datatables.js')}}"></script>
