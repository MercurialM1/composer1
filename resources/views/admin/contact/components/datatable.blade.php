
<div class="table-responsive">
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <a href class ='button' {{route('photo.create')}}>Добавить фото</a>
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Почта</th>
                                <th>Телефон</th>
                                <th>Тип сотрудничества</th>
                                <th>Сообщение</th>
                                <th>X</th>
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
                                {{$contact->status}}
                            </th>
                            <th>
                                {{$contact->message}}
                            </th>
                            <th>Временная затычка</th>
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
