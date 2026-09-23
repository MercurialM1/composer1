
<div class="light-wrapper">
    <div class="container inner">
        <div class="blog grid-view">
            <div class="table-responsive">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif

                <table class="table table-striped table-bordered align-middle">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 150px;">Изображение</th>
                        <th scope="col">Товар</th>
                        <th scope="col" style="width: 180px;">Категории</th>
                        <th scope="col" style="width: 120px;">Цена</th>
                        <th scope="col" style="width: 120px;">Кол-во</th>
                        <th scope="col" style="width: 120px;">Сумма</th>
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
                                <a class="link-effect">{{$item->quantity}}шт</a>

                            </td>
                            <td class="text-nowrap font-weight-bold">
                                <span class="comments">
                                    <a href="#" class="link-effect">{{$item->product->price * $item->quantity}} Руб</a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="light-wrapper">
    <div class="container inner">
        <div class="thin">
            <div class="section-title text-center">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
                <h3>Ваш заказ {{auth()->user()->name }}</h3>
                <p class="lead">Срок доставки будет указан в письме</p>
            </div>
            <div class="text-center" style="margin-top: 20px; font-size: 1.2em; font-weight: bold;">
                Все товары: {{ $cartItems->sum(fn($item) => $item->quantity) }} <br>
                Итого: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }} Руб
            </div>
            <p class="text-center">ты лох</p>
            <div class="divide50"></div>
            <div class="form-container">
                <form action="{{route('cabinet.cart.order')}}" method="post" class="vanilla vanilla-form" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="text" name="recipient_name" placeholder="Имя" required="required">
                                    <i class="icon-user"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="text" name="address" placeholder="Адрес доставки" required="required">
                                    <i class="icon-phone"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <input type="tel" name="phone" placeholder="Номер телефона" required="required">
                                    <i class="icon-phone"></i></label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field">
                                <label>
                                    <textarea name="comment" placeholder="Комментарий"></textarea>
                                </label>
                            </div>
                            <!--/.form-field -->
                        </div>
                        <!--/column -->
                        <!--/column -->
                        <div class="text-right" style="margin-top: 20px; font-size: 1.2em; font-weight: bold;">
                            Все товары: {{ $cartItems->sum(fn($item) => $item->quantity) }} <br>
                            Итого: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }} Руб
                        </div>
                    </div>
                    @error('error')
                    <div class="alert alert-danger" style="color: red; padding: 10px; border: 1px solid red; background-color: #f8d7da; border-radius: 5px; margin-bottom: 15px;">
                        {{ $message }}
                    </div>
                    @enderror

                    <button type="submit">Оформить заказ</button>
                    <!--/.row -->
                </form>
                <!--/.vanilla-form -->
            </div>
            <!--/.form-container -->

        </div>
        <!-- /.container -->
    </div>
</div>
