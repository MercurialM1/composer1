
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Сообщения</h4>
                                </div>
                            </div>
                        </div>
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Почта</th>
                                <th>Телефон</th>
                                <th>Тип сотрудничества</th>
                                <th>Сообщение</th>
                                <th>Аккаунт</th>
                                <th>Заявка</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($contacts as $contact)
                        <tr>
                            <td>
                                {{$contact->id}}
                            </td>
                            <td>
                                {{$contact->name}}
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td>
                                {{$contact->phone}}
                            </td>
                            <th>
                                {{$contact->department}}
                            </th>
                            <th>
                                {{$contact->message}}
                            </th>
                            <td>
                                @if($contact->user_id)

                                    <form action="{{ route('admin.contactus.deleteUser',$contact->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit">
                                            X
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.contactus.createUser',$contact->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Создать аккаунт</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action ="{{route('admin.contactus.destroy',$contact->id)}}" method="POST">
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
