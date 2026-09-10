@extends('client.index')
@section('content')
    <div class="light-wrapper">
        <div class="container inner">
            <div class="blog grid-view col3">
                <div class="blog-posts text-boxes">
                    <div class="isotope row">
                @foreach($produscts as $product)
                        <div class="col-sm-6 col-md-4 grid-view-post">
                            <div class="post box">
                                <figure class="main"><a href="blog-post.html">
                                        <div class="text-overlay">
                                            <div class="info"><span>Read More</span></div>
                                        </div>
                                        <img src="style/images/art/b1.jpg" alt="" /></a></figure>
                                <h4 class="post-title"><a href="blog-post.html">Parturient Commodo Aenean</a></h4>
                                <div class="meta"><span class="date"><a href="#" class="link-effect">14 Oct 2014</a></span><span class="category"><a href="#" class="link-effect">Logo</a>, <a href="#" class="link-effect">PSD</a></span><span class="comments"><a href="#" class="link-effect"><i class="icon-chat-1"></i> 15</a></span></div>
                                <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient. Curabitur blandit tempus lacinia odio sem nec elit.</p>
                                <a href="blog-post.html" class="more link-effect">Read More »</a> </div>
                                </div><!-- /.post -->
                        <!-- /column -->
                        <!-- /column -->

                    </div>
                    <!-- /.isotope -->
                </div>
        @endforeach
            </div>
            <!-- /.blog -->

        <!--/.container -->


@endsection
