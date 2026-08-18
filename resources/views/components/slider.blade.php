@if($slides->isNotEmpty())
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
                            <div class="tp-caption large sfb text-center"
                                 data-x="center"
                                 data-y="263"
                                 data-speed="900"
                                 data-start="800"
                                 data-easing="Sine.easeOut">
                                {{ $slide->title }}
                            </div>
                        @endif

                        @if($slide->description)
                            <div class="tp-caption medium sfb text-center"
                                 data-x="center"
                                 data-y="348"
                                 data-speed="900"
                                 data-start="1500"
                                 data-easing="Sine.easeOut">
                                {{ $slide->description }}
                            </div>
                        @endif

                        @if($slide->button_text && $slide->button_url)
                            <div class="tp-caption sfb"
                                 data-x="center"
                                 data-y="420"
                                 data-speed="900"
                                 data-start="2200"
                                 data-easing="Sine.easeOut"
                                 data-endspeed="100">
                                <a href="{{ $slide->button_url }}" class="btn btn-large btn-border">
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
    <!-- Если слайдов нет, показываем заглушку -->
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
                        Добавьте слайды в админке
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
@endif
