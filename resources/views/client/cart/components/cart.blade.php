<div class="light-wrapper">
    <div class="container inner">
        <div class="blog grid-view">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 150px;">Изображение</th>
                        <th scope="col">Товар</th>
                        <th scope="col" style="width: 180px;">Категории</th>
                        <th scope="col" style="width: 120px;">Цена</th>
                        <th scope="col" style="width: 120px;">Кол-во</th>
                        <th scope="col" style="width: 120px;">Сумма</th>
                        <th scope="col" style="width: 120px;">X</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <figure class="main" style="margin: 0;">
                                        <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{$item->product->name}}" class="img-fluid" style="max-width: 100px; height: auto;"/>
                                </figure>
                            </td>
                            <td>
                                <h4 class="post-title" style="margin-bottom: 5px;">
                                    {{$item->product->name}}
                                </h4>
                                <p style="margin: 0; font-size: 0.9em; color: #666;">{{$item->product->description}}.</p>
                                <a href="#" class="more link-effect" style="font-size: 0.85em;">Read More »</a>
                            </td>
                            <td>
                                <div class="meta">
                                    <span class="category">
                                        <a href="#" class="link-effect">{{$item->product->categories->pluck('name')->join(', ')}}</a>{{--все имена категорий через запятую--}}
                                    </span>
                                </div>
                            </td>
                            <td class="text-nowrap font-weight-bold">
                                <span class="comments">
                                    <a href="#" class="link-effect">{{$item->product->price}} Руб</a>
                                </span>
                            </td>
                            <td class="text-nowrap font-weight-bold">
                                <form style="display:inline-block" action ="{{route('cabinet.cart.update',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{$item->quantity + 1}}"/>
                                    <button type="submit">+</button>
                                </form>
                                <a class="link-effect">{{$item->quantity}}шт</a>
                                @if($item->quantity > 1)
                                <form style="display:inline-block" action ="{{route('cabinet.cart.update',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{$item->quantity - 1}}">
                                    <button type="submit">-</button>
                                </form>
                                @endif

                            </td>
                            <td class="text-nowrap font-weight-bold">
                                <span class="comments">
                                    <a href="#" class="link-effect">{{$item->product->price * $item->quantity}} Руб</a>
                                </span>
                            </td>
                            <td>
                                <form action ="{{route('cabinet.cart.destroy',$item->id)}}" method="POST">
                                    @csrf
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
                <div class="text-right" style="margin-top: 20px; font-size: 1.2em; font-weight: bold;">
                    Все товары: {{ $cartItems->sum(fn($item) => $item->quantity) }} <br>
                    Итого: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }} Руб



                    <li><a href="#" class="btn">Prev</a></li>

            </div>
        </div>
    </div>
</div>
</div>
