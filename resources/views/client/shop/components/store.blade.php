<div class="light-wrapper">
    <div class="container inner">
        <div class="headline text-center">
            <div class="alert alert-success">
                <span>Уведомление</span>
                @foreach(auth()->user()->unreadNotifications->take(1) as $notification)
                    <div>
                        <p>{{ $notification->data['message'] }} {{$notification->data['product_name']}}
                        в количесве {{$notification->data['count']}} Шт
                        </p>
                    </div>
                @endforeach
            </div>
            <h1>Darova,{{auth()->user()->name }}</h1>
            <h3>Добро пожаловать</h3>
        </div>
        <div class="cbp-panel">
            <div id="filters-container" class="cbp-filter-container text-center">
                @foreach($categories as $category)
                <div data-filter=".cat-{{$category->id}}" class="cbp-filter-item {{ $loop->first ? 'cbp-filter-item-active' : '' }}"> {{$category->name}}</div>
                @endforeach
            </div>
            <div id="grid-container" class="cbp">
                @foreach($products as $product)
                <div class="cbp-item
                @foreach($product->categories as $category)
                cat-{{ $category->id }}
                    @endforeach"><a href="#" class="cbp-caption">
                        <div class="cbp-caption-defaultWrap"><img src="{{asset('storage/'.$product->image)}}" width="100" alt=""/></div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{{$product->name}}</div>
                                    <div class="cbp-l-caption-title">{{$product->description}}</div>
                                    <div class="cbp-l-caption-title">{{$product->price}}</div>
                            </div>
                            </div>
                        </div>
                </a> </div>
                @endforeach
        </div>
        </div>
    </div>
</div>
