<div class="light-wrapper">
    <div class="container inner">
        <div class="section-title text-center">
            <h3>The Product Gallery</h3>
            <p class="lead">awesome products prepared with creative ideas and great design</p>
        </div>

        <div class="cbp-panel">
            <!-- ФИЛЬТРЫ -->
            <div id="filters-container" class="cbp-filter-container text-center">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All</div>

                @if(isset($categories) && $categories->where('slug', '!=', 'all')->count() > 0)
                    @foreach($categories->where('slug', '!=', 'all')->where('is_active', true) as $category)
                        <div data-filter=".{{ $category->slug }}" class="cbp-filter-item"> {{ $category->name }}</div>
                    @endforeach
                @else
                    <div data-filter=".print" class="cbp-filter-item"> Print</div>
                    <div data-filter=".web" class="cbp-filter-item"> Web Design</div>
                    <div data-filter=".logo" class="cbp-filter-item"> Logo</div>
                    <div data-filter=".motion" class="cbp-filter-item"> Motion</div>
                @endif
            </div>

            <!-- РАБОТЫ -->
            <div id="grid-container" class="cbp">
                @php
                    $hasItems = isset($items) && $items instanceof \Illuminate\Support\Collection && $items->isNotEmpty();
                @endphp

                @if($hasItems)
                    {{-- ДИНАМИЧЕСКИЙ РЕЖИМ: показываем работы из БД --}}
                    @foreach($items as $item)
                        @php
                            // Получаем slug'и категорий работы
                            $categorySlugs = $item->getCategorySlugsArray();
                            // Получаем названия категорий для отображения
                            $categoryNames = isset($categories)
                                ? $categories->whereIn('slug', $categorySlugs)->pluck('name')->implode(', ')
                                : '';
                            // Формируем CSS-классы для фильтрации
                            $filterClasses = implode(' ', $categorySlugs);
                        @endphp

                        <div class="cbp-item {{ $filterClasses }}">
                            <a href="{{ $item->link ?? '#' }}" class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"/>
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">{{ $item->title }}</div>
                                            <div class="cbp-l-caption-desc">{{ $categoryNames }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    {{-- РЕЖИМ ЗАГЛУШЕК --}}
                    <div class="cbp-item print motion">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p1.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Malesuada Parturient</div>
                                        <div class="cbp-l-caption-desc">Print, Motion</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item web logo">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p2.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Tellus Nibh</div>
                                        <div class="cbp-l-caption-desc">Web Design</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item print motion">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p3.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Pellentesque Mattis</div>
                                        <div class="cbp-l-caption-desc">Print, Motion</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item web print">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p4.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Euismod Pharetra</div>
                                        <div class="cbp-l-caption-desc">Web Design, Print</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item motion logo">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p5.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Fringilla Nullam</div>
                                        <div class="cbp-l-caption-desc">Motion</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item print motion">
                        <a href="#" class="cbp-caption cbp-singlePageInline">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('style/images/art/p6.jpg') }}" alt=""/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Pharetra Sem</div>
                                        <div class="cbp-l-caption-desc">Print, Motion</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <!--/.cbp -->

            <div class="divide30"></div>
            <div class="text-center">
                <div id="loadMore-container" class="">
                    <a href="ajax/loadmore.html" class="cbp-l-loadMore-link btn btn-border dark">
                        <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
                        <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                        <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
                    </a>
                </div>
            </div>
        </div>
        <!--/.cbp-panel -->
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->
