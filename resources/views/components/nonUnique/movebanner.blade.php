@if(isset($slides) && $slides->isNotEmpty())
    <div class="tp-fullscreen-container revolution">
        <div class="tp-fullscreen">
            <ul>
                @foreach($slides as $index => $slide)
                    <li data-transition="fade">
                        <img src="{{ asset('storage/' . $slide->image) }}"
                             alt="{{ $slide->title }}"
                             data-bgposition="center top"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat" />

                        @if($slide->title)
                            @if($index === 0)
                                {{-- Первый слайд - по центру --}}
                                <div class="tp-caption large sfb text-center"
                                     data-x="center"
                                     data-y="263"
                                     data-speed="900"
                                     data-start="800"
                                     data-easing="Sine.easeOut">
                                    {{ $slide->title }}
                                </div>
                            @elseif($index === 1)
                                {{-- Второй слайд - по центру --}}
                                <div class="tp-caption large sfl text-center"
                                     data-x="center"
                                     data-y="263"
                                     data-speed="900"
                                     data-start="800"
                                     data-easing="Sine.easeOut">
                                    {{ $slide->title }}
                                </div>
                            @else
                                {{-- Третий и далее - слева --}}
                                <div class="tp-caption large sfr"
                                     data-x="30"
                                     data-y="263"
                                     data-speed="900"
                                     data-start="800"
                                     data-easing="Sine.easeOut">
                                    {!! nl2br(e($slide->title)) !!}
                                </div>
                            @endif
                        @endif

                        @if($slide->description)
                            @if($index < 2)
                                <div class="tp-caption medium sfb text-center"
                                     data-x="center"
                                     data-y="348"
                                     data-speed="900"
                                     data-start="1500"
                                     data-easing="Sine.easeOut">
                                    {{ $slide->description }}
                                </div>
                            @else
                                <div class="tp-caption medium sfr"
                                     data-x="30"
                                     data-y="403"
                                     data-speed="900"
                                     data-start="1500"
                                     data-easing="Sine.easeOut">
                                    {{ $slide->description }}
                                </div>
                            @endif
                        @endif

                        @if($slide->button_text)
                            <div class="tp-caption sfb"
                                 data-x="{{ $index < 2 ? 'center' : '30' }}"
                                 data-y="420"
                                 data-speed="900"
                                 data-start="2200"
                                 data-easing="Sine.easeOut"
                                 data-endspeed="100">
                                <a href="{{ $slide->button_url ?? '#' }}"
                                   class="btn btn-large {{ $index === 0 ? 'btn-border' : '' }}">
                                    {{ $slide->button_text }}
                                </a>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
@else
    {{-- Если слайдов нет, показываем дефолтный слайдер --}}
    <div class="tp-fullscreen-container revolution">
        <div class="tp-fullscreen">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('style/images/art/slider-bg1.jpg') }}"
                         alt="Welcome"
                         data-bgposition="center top"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat" />
                    <div class="tp-caption large sfb text-center"
                         data-x="center"
                         data-y="263"
                         data-speed="900"
                         data-start="800"
                         data-easing="Sine.easeOut">
                        Quality. Flexibility. Customizability
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
@endif
