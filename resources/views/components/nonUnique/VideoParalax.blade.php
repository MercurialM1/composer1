@if(isset($videos) && $videos->isNotEmpty())
    @foreach($videos as $video)
        <div class="outer-wrap inverse-wrapper">
            <div id="video-wrap" class="video-wrap">
                <video preload="metadata" playsinline autoplay muted loop id="video-office">
                    @if($video->video_mp4)
                        <source src="{{ asset('storage/' . $video->video_mp4) }}" type="video/mp4">
                    @endif
                    @if($video->video_webm)
                        <source src="{{ asset('storage/' . $video->video_webm) }}" type="video/webm">
                    @endif
                </video>
                <div class="content-overlay container">
                    <div class="headline text-center">
                        @if($video->title)
                            <h2>{{ $video->title }}</h2>
                        @endif
                        @if($video->description)
                            <p class="lead">{{ $video->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    {{-- Дефолтный вариант, если видео нет --}}
    <div class="outer-wrap inverse-wrapper">
        <div id="video-wrap" class="video-wrap">
            <video preload="metadata" playsinline autoplay muted loop id="video-office">
                <source src="{{ asset('style/video/office.mp4') }}" type="video/mp4">
                <source src="{{ asset('style/video/office.webm') }}" type="video/webm">
            </video>
            <div class="content-overlay container">
                <div class="headline text-center">
                    <h2>Video Parallax</h2>
                    <p class="lead">For better visualization of your company</p>
                </div>
            </div>
        </div>
    </div>
@endif
