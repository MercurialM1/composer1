
<div id="content" class="main-content">
    <div class="container">

        <div class="container">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Админка</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->




            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Редактирование фото</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('photo.update',$photo->id) }}" enctype="multipart/form-data">
                        @method('PUT')
@csrf

@foreach($categories as $category)
<label>
    <input type="checkbox" name='categories[]' value="{{$category->id}}"
        @if($photo->categories->contains($category)) {{--проверка чекбоксов--}}
        checked
    @endif

        >
    {{$category->name}}
</label>

@endforeach
                    <div>
    <label>Имя</label>
    <input name="title" value="{{$photo->title}}">
                    </div>
                    <div>
                        <label>Описание</label>
<textarea name="description">{{$photo->description}}</textarea>
                    </div>
                        <div>
    <label>Путь</label>
    <input name="path" type='file'>
                    </div>
                        <div>
                        <label>Активно</label>
                            <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1"
                               @if($photo->is_active)
                                   checked
                               @endif>

                        </div>

                        <div>
                            <label>Порядок</label>
                            <input type="number" name="sort" value="{{$photo->sort}}">
                        </div>

                        <button type="submit">Обновить</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
