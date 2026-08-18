@extends('admin.slides.admin')

@section('page-title', 'Редактировать слайд')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Редактировать слайд #{{ $slide->id }}</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Заголовок -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        Заголовок <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="title"
                                           id="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', $slide->title) }}"
                                           required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Описание -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea name="description"
                                              id="description"
                                              rows="4"
                                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $slide->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Изображение -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Изображение</label>

                                    @if($slide->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $slide->image) }}"
                                                 alt="Текущее изображение"
                                                 class="img-fluid rounded"
                                                 style="max-width: 300px; max-height: 200px;">
                                            <p class="text-muted small mt-1">Текущее изображение</p>
                                        </div>
                                    @endif

                                    <input type="file"
                                           name="image"
                                           id="image"
                                           class="form-control @error('image') is-invalid @enderror"
                                           accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Оставьте пустым, чтобы не менять изображение
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Настройки</h6>

                                        <!-- Порядок -->
                                        <div class="mb-3">
                                            <label for="order" class="form-label">Порядок отображения</label>
                                            <input type="number"
                                                   name="order"
                                                   id="order"
                                                   class="form-control @error('order') is-invalid @enderror"
                                                   value="{{ old('order', $slide->order) }}"
                                                   min="0">
                                            @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Меньше = раньше</small>
                                        </div>

                                        <!-- Активен -->
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="is_active" value="0">
                                                <input type="checkbox"
                                                       name="is_active"
                                                       id="is_active"
                                                       class="form-check-input"
                                                       value="1"
                                                    {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Активен
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Кнопка -->
                                        <hr>
                                        <h6 class="card-title">Кнопка</h6>

                                        <div class="mb-3">
                                            <label for="button_text" class="form-label">Текст кнопки</label>
                                            <input type="text"
                                                   name="button_text"
                                                   id="button_text"
                                                   class="form-control @error('button_text') is-invalid @enderror"
                                                   value="{{ old('button_text', $slide->button_text) }}">
                                            @error('button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="button_url" class="form-label">Ссылка кнопки</label>
                                            <input type="url"
                                                   name="button_url"
                                                   id="button_url"
                                                   class="form-control @error('button_url') is-invalid @enderror"
                                                   value="{{ old('button_url', $slide->button_url) }}">
                                            @error('button_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                                Сохранить изменения
                            </button>
                            <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
