@extends('client.index')
@section('content')
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
                                <figure class="main"><a href="blog-post.html">
                                        <div class="text-overlay">
                                            <div class="info"><span>Read More</span></div>
                                        </div>
                                        <img src="{{asset ('storage/' . $product->image)}}" alt="" /></a></figure>
                                <h4 class="post-title">{{$product->name}}</h4>
                                <div class="meta"><span class="date">{{ $product->categories->pluck('name')->join(', ') }}</span><span class="category"><a href="#" class="link-effect">{{ $product->price }} Руб</a>, <a href="#" class="link-effect">{{$product->count}}</a></span><span class="comments"><a href="#" class="link-effect"><i class="icon-chat-1"></i> 15</a></span></div>
                                <p>{{ $product->description }}</p>
                                <a href="blog-post.html" class="more link-effect">Read More »</a> </div>
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


@endsection
