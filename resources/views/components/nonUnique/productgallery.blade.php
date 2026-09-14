<div class="light-wrapper">
    <div class="container inner">
        <div class="section-title text-center">
            <h3>The Product Gallery</h3>
            <p class="lead">awesome products prepared with creative ideas and great design</p>
        </div>
        <div class="cbp-panel">
            <div id="filters-container" class="cbp-filter-container text-center">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All</div>
                @foreach($categories as $category) {{-- отображение категорий по id--}}
                    <div data-filter=".cat-{{$category->id}}" class="cbp-filter-item">{{$category->name}}</div>
                @endforeach
            </div>
            <div id="grid-container" class="cbp">
            @foreach($photos as $photo)



                <div class="cbp-item
                @foreach($photo->categories as $category)
                cat-{{ $category->id }} {{--cat Css хуйня какаято как и сверху--}}
                @endforeach"><a href="#" class="cbp-caption cbp-singlePageInline">
                        <div class="cbp-caption-defaultWrap"><img src="{{asset('storage/'.$photo->path)}}" width="100" alt=""/></div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{{$photo->title}}</div>
                                    <div class="cbp-l-caption-desc">{{$photo->description}}</div>
                                </div>
                            </div>
                        </div>
                    </a></div>
                @endforeach
                <!--/.cbp-item -->
                <!--/.cbp-item -->
            </div>
            <!--/.text-center -->
        </div>
        <!--/.cbp-panel -->
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->
