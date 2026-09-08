<div id="content" class="main-content">
<div class="container">
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Все категории</h4>
                    </div>
                </div>
            </div>
        <div class="widget-content widget-content-area br-8">

            <div class="table-responsive">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
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
                        {{$category->name}}
                    </td>


                    <td>
                        {{$category->sort}}
                    </td>
                    <td>
                        @if ($category->is_active)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>

                    <td>
                        <a href="{{route('admin.category.edit',$category->id)}}">ИЗМЕНИТЬ</a>
                    </td>
                    <td>
                        <form
                            action ="{{route('admin.category.destroy',$category->id)}}" method="POST">
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

