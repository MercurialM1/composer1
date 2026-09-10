<div id="content" class="main-content">
<div class="container">
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Все товары</h4>
                    </div>
                </div>
            </div>
        <div class="widget-content widget-content-area br-8">

            <div class="table-responsive">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Изоображение</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Доставка</th>
                    <th>Порядок</th>
                    <th>Активно</th>
                    <th>Редактирование</th>
                    <th>X</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                <tr>
                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-height: 50px; object-fit: cover;">
                    @else
                        <span class="text-muted">Нет фото</span>
                     @endif
                    </td>
                    <td>
                        {{$product->description}}
                    </td>
                    <td>
                        {{$product->categories->pluck('name')->join(', ')}} {{-- взять имя из категории и вставить сюда --}}
                    </td>
                    <td>
                        {{$product->price}}
                    </td>
                    <td>
                        {{$product->count}}
                    </td>
                    <td>
                        {{$product->delivery}}
                    </td>

                    <td>
                        {{$product->sort}}
                    </td>
                    <td>
                        @if ($product->is_active)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>

                    <td>
                        <a href="{{route('admin.product.edit',$product->id)}}">ИЗМЕНИТЬ</a>
                    </td>
                    <td>
                        <form
                            action ="{{route('admin.product.destroy',$product->id)}}" method="POST">
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

