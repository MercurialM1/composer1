@extends('admin.slides.admin')

@section('page-title', 'Редактировать видео')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Редактировать видео #{{ $video->id }}</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.videos.update', $video) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Заголовок</label>
                                    <input type="text" name="title" id="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', $video->title) }}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $video->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="video_mp4" class="form-label">Видео MP4</label>
                                    @if($video->video_mp4)
                                        <div class="mb-2">
                                            <video width="300" controls>
                                                <source src="{{ asset('storage/' . $video->video_mp4) }}" type="video/mp4">
                                            </video>
                                            <p class="text-muted small mt-1">Текущее видео</p>
                                        </div>
                                    @endif
                                    <input type="file" name="video_mp4" id="video_mp4"
                                           class="form-control @error('video_mp4') is-invalid @enderror"
                                           accept="video/mp4,video/mov">
                                    @error('video_mp4')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Оставьте пустым, чтобы не менять видео
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="video_webm" class="form-label">Видео WEBM</label>
                                    @if($video->video_webm)
                                        <div class="mb-2">
                                            <p class="text-success">✓ Видео загружено</p>
                                        </div>
                                    @endif
                                    <input type="file" name="video_webm" id="video_webm"
                                           class="form-control @error('video_webm') is-invalid @enderror"
                                           accept="video/webm">
                                    @error('video_webm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Настройки</h6>

                                        <div class="mb-3">
                                            <label for="order" class="form-label">Порядок</label>
                                            <input type="number" name="order" id="order"
                                                   class="form-control" value="{{ old('order', $video->order) }}" min="0">
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="is_active" value="0">
                                                <input type="checkbox" name="is_active" id="is_active"
                                                       class="form-check-input" value="1"
                                                    {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Активно
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Сохранить изменения
                            </button>
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
