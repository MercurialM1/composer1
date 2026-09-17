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
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></th>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        @endif
                    </td>

                    <td>
                        <form action="{{route('admin.product.edit',$product->id)}}">
                            @csrf
                            <button class="btn btn-primary mb-2 me-4">
                                Изменить
                            </button>
                        </form>
                    </td>
                    <td>
                           <form action ="{{route('admin.product.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                               <button class="btn btn-danger mb-2 me-4"
                                       type="submit">Удалить
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

