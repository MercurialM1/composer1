@extends('admin.slides.admin')

@section('page-title', 'Управление слайдами')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                            <h4>Все слайды ({{ $slides->count() }})</h4>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-end">
                            <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Добавить слайд
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    @if($slides->isEmpty())
                        <div class="text-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <h5 class="text-muted">Слайдов пока нет</h5>
                            <p class="text-muted">Создайте первый слайд, чтобы начать</p>
                            <a href="{{ route('admin.slides.create') }}" class="btn btn-primary mt-3">
                                Создать первый слайд
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Изображение</th>
                                    <th>Заголовок</th>
                                    <th>Описание</th>
                                    <th>Порядок</th>
                                    <th>Статус</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slides as $slide)
                                    <tr>
                                        <td>{{ $slide->id }}</td>
                                        <td>
                                            @if($slide->image)
                                                <img src="{{ asset('storage/' . $slide->image) }}"
                                                     alt="{{ $slide->title }}"
                                                     class="slide-preview">
                                            @else
                                                <span class="badge bg-secondary">Нет изображения</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $slide->title }}</strong>
                                            @if($slide->button_text)
                                                <br>
                                                <small class="text-muted">
                                                    Кнопка: {{ $slide->button_text }}
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ Str::limit($slide->description, 60) }}
                                            </small>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $slide->order }}</span>
                                        </td>
                                        <td>
                                            @if($slide->is_active)
                                                <span class="badge bg-success">Активен</span>
                                            @else
                                                <span class="badge bg-danger">Неактивен</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.slides.edit', $slide) }}"
                                               class="btn btn-sm btn-info btn-action"
                                               data-bs-toggle="tooltip"
                                               title="Редактировать">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2">v
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path
                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('admin.slides.destroy', $slide) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Вы уверены, что хотите удалить этот слайд?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger btn-action"
                                                        data-bs-toggle="tooltip"
                                                        title="Удалить">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    </svg>
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Инициализация tooltip
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })
            });
        </script>
    @endpush
@endsection
