
    <div id="content" class="main-content">
        <div class="container">
<div class="row layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Слайдеры</h4>
                </div>
            </div>
        </div>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Номер</th>
                    <th>Изображение</th>
                    <th>Активно</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Редактирование</th>
                    <th>X</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sliders as $slider)
                <tr>

                    <td>
                        {{ $slider->id }}
                    </td>
                    <td>
                        @if($slider->Image)
                            <img src="{{ asset('storage/' . $slider->Image) }}" alt="{{ $slider->Zagalovok }}" style="max-height: 50px; object-fit: cover;">
                        @else
                            <span class="text-muted">Нет фото</span>
                    @endif
                    </td>
                    <td>
                        @if ($slider->Active)
                    <h1>+</h1>
                        @else
                    <h2>-</h2>
                        @endif
                    </td>

                    <td>
                        {{$slider->Zagalovok}}
                    </td>

                    <td>
                        @if($slider->Description)

                            <span class="text-muted">{{$slider->Description}}</span>

                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.slider.edit',$slider )}}">ИЗМЕНИТЬ</a>
                    </td>
                    <td>
                        <form
                            action ="{{route('admin.slider.destroy',$slider->id)}}" method="POST"/>
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
    </div>
</div>
