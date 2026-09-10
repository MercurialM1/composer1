
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
                                <h4>Редактирование товара</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data">
                        @method('PUT')
@csrf

@foreach($categories as $category)
<label>
    <input type="checkbox" name='productcategories[]' value="{{$category->id}}"
        @if($product->categories->contains($category)) {{--проверка чекбоксов--}}
        checked
    @endif

        >
    {{$category->name}}
</label>

@endforeach
                    <div>
    <label>Имя</label>
    <input type="text" name="name" value="{{$product->name}}">
                    </div>
                    <div>
                        <label>Описание</label>
<textarea name="description">{{$product->description}}</textarea>
                    </div>
                        <div>
    <label>Путь</label>
    <input name="image" type='file'>
                    </div>
                        <div>
                        <label>Активно</label>
                            <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1"
                               @if($product->is_active)
                                   checked
                               @endif>

                        </div>
                        <div>
                            <label>Цена</label>
                            <input name="price" value="{{$product->price}}">
                        </div>
                        <div>
                            <label>Доставка</label>
                            <input name="delivery" value="{{$product->delivery}}">
                        </div>
                        <div>
                            <label>Количество</label>
                            <input name="count" value="{{$product->count}}">
                        </div>
                        <div>
                            <label>Порядок</label>
                            <input type="number" name="sort" value="{{$product->sort}}">
                        </div>

                        <button type="submit">Обновить</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
