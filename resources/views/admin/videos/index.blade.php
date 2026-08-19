@extends('admin.slides.admin')

@section('page-title', 'Управление видео')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                            <h4>Все видео ({{ $videos->count() }})</h4>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-end">
                            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
                                + Добавить видео
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    @if($videos->isEmpty())
                        <div class="text-center py-5">
                            <h5 class="text-muted">Видео пока нет</h5>
                            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary mt-3">
                                Добавить первое видео
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Видео MP4</th>
                                    <th>Видео WEBM</th>
                                    <th>Заголовок</th>
                                    <th>Описание</th>
                                    <th>Порядок</th>
                                    <th>Статус</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>
                                            @if($video->video_mp4)
                                                <video width="100" height="60" controls>
                                                    <source src="{{ asset('storage/' . $video->video_mp4) }}" type="video/mp4">
                                                </video>
                                            @else
                                                <span class="badge bg-secondary">Нет</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($video->video_webm)
                                                <span class="badge bg-success">✓</span>
                                            @else
                                                <span class="badge bg-secondary">Нет</span>
                                            @endif
                                        </td>
                                        <td>{{ $video->title ?? '—' }}</td>
                                        <td>
                                            <small class="text-muted">
                                                {{ Str::limit($video->description, 50) }}
                                            </small>
                                        </td>
                                        <td><span class="badge bg-info">{{ $video->order }}</span></td>
                                        <td>
                                            @if($video->is_active)
                                                <span class="badge bg-success">Активно</span>
                                            @else
                                                <span class="badge bg-danger">Неактивно</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.videos.edit', $video) }}"
                                               class="btn btn-sm btn-info">
                                                ✏️
                                            </a>
                                            <form action="{{ route('admin.videos.destroy', $video) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Удалить видео?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    🗑️
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
