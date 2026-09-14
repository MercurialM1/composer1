<div class="light-wrapper">
    <div class="container inner">
        <div class="blog grid-view col3">
            <div class="blog-posts text-boxes">
                <div class="isotope row">
                    <div id="filters-container" class="cbp-filter-container text-center">
                        @foreach($categories as $category)
                            <div data-filter=".cat-{{$category->id}}" class="cbp-filter-item {{ $loop->first ? 'cbp-filter-item-active' : '' }}"> {{$category->name}}</div>
                        @endforeach
                    </div>
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 grid-view-post @foreach($product->categories as $cat) cat-{{ $cat->id }} @endforeach">
                            <div class="post box">
                                <figure class="main"><a>
                                        <img src="{{asset ('storage/' . $product->image)}}" alt="" /></a></figure>
                                <h4 class="post-title">{{$product->name}}</h4>
                                <div class="meta"><span class="date">{{ $product->categories->pluck('name')->join(', ') }}</span><span class="category"><a href="#" class="link-effect">{{ $product->price }} Руб</a></span><span class="comments"><a href="#" class="link-effect"><i class="budicon-shopping-bag"></i>{{$product->count}}</a></span></div>
                                <p>{{ $product->description }}</p>
                                <form action="{{ route('cabinet.cart.add') }}" method="POST" style="margin-top: 10px;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="link-effect">В корзину</button>
                                </form></div>
                        </div><!-- /.post -->
                        <!-- /column -->
                        <!-- /column -->

                    @endforeach
                </div>
                <!-- /.isotope -->
            </div>

        </div>
        <!-- /.blog -->

        <!--/.container -->

    </div>
</div>
