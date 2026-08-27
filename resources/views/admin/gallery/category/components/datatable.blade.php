
<div class="table-responsive">
<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>1111111111</th>
                    <th>Название</th>
                    <th>Порядок</th>
                    <th>Активно</th>
                    <th>Редактирование</th>
                    <th>X</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        {{ $category->name}}
                    </td>


                    <td>
                        {{$category->sort}}
                    </td>
                    <td>
                        @if ($category->is_active)
                            <h1>✅</h1>
                        @else
                            <h2>❌</h2>
                        @endif
                    </td>

                    <td>
                        <a href="{{route('category.edit',$category )}}">ИЗМЕНИТЬ</a>
                    </td>
                    <td>
                        <form
                            action ="{{route('category.destroy',$category->id)}}" method="POST"/>
                        @method('DELETE')
                        <button
                            type="submit">удалить
                        </button>

                    </td>


                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
</div>
