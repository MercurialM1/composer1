
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
                    <th>Картинка</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Порядок</th>
                    <th>Категория</th>
                    <th>Активно</th>
                    <th>Редактирование</th>
                    <th>X</th>
                </tr>
                </thead>
                <tbody>

                @foreach($photos as $photo)
                <tr>
                    <td>
                        {{$photo->id}}
                    </td>
                    <td><img src="{{ asset('storage/' . $photo->path) }}" width="100"></td>
                    <td>
                        {{ $photo->title}}
                    </td>
                    <td>{{$photo->description}}</td>


                    <td>
                        {{$photo->sort}}
                    </td>
                    <td>
                        {{$photo->categories->pluck('name')->join(', ')}} {{-- взять имя из категории и вставить сюда --}}
                    </td>
                    <td>
                        @if ($photo->is_active)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>

                    <td>
                        <a href="{{route('photo.edit',$photo )}}">ИЗМЕНИТЬ</a>
                    </td>
                    <td>
                        <form
                            action ="{{route('photo.destroy',$photo->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
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
