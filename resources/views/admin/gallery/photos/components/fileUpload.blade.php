
<div id="content" class="main-content">
    <div class="container">

        <div class="container">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Админка</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Создание</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Создание фото</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('admin.photo.store') }}" enctype="multipart/form-data">
                          @csrf
                        @foreach($categories as $category) {{--вставить категорию по id--}}
                        <label class="form-check-label" for="form-check-default">
                                {{ $category->name }}
                            <input class="form-check-input" type="checkbox" id="form-check-default"  name="categories[]" value="{{ $category->id }}">
                            </label>
                        @endforeach
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Заголовок</label>
                            <input class="form-control"  type="text" name="title" placeholder="Название" aria-describedby="basic-addon1" value="{{old('title')}}"> {{--сохраниение если не надо менять--}}
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Описание</label>
                            <<textarea class="form-control" name="description" aria-label="With textarea">{{old('description')}}</textarea> {{--тоже самое с описанием--}}
                        </div>

                        <div class="form-group mb-4 mt-3">
                            <label for="exampleFormControlFile1">Фото</label>
                            <input type="file" name="path" class="btn btn-secondary  mb-2 me-4" id="exampleFormControlFile1">
                        </div>

                        <div class="form-check form-check-primary form-check-inline">
                            <input type="hidden" name="is_active" value="0">
                            <label class="form-check-label" for="form-check-default">Активно</label>
                            <input class="form-check-input" type="checkbox" id="form-check-default" name="is_active" value="1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Порядок</span>
                            <input type="number" name="sort" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ old('sort', 0) }}">
                            </div>
                                <input type="submit"  class="mt-4 mb-4 btn btn-primary">

                            </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">




        </div>
    </div>
</div>
