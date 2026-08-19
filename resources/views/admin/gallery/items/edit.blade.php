@extends('admin.slides.admin')

@section('page-title', 'Редактировать работу')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Редактировать работу "{{ $item->title }}"</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.gallery.items.update', $item) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        Название работы <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="title" id="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', $item->title) }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Изображение</label>
                                    @if($item->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 alt="Текущее изображение"
                                                 class="img-fluid rounded"
                                                 style="max-width: 300px;">
                                            <p class="text-muted small mt-1">Текущее изображение</p>
                                        </div>
                                    @endif
                                    <input type="file" name="image" id="image"
                                           class="form-control @error('image') is-invalid @enderror"
                                           accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Оставьте пустым, чтобы не менять изображение
                                    </small>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="client" class="form-label">Клиент</label>
                                        <input type="text" name="client" id="client"
                                               class="form-control" value="{{ old('client', $item->client) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="project_date" class="form-label">Дата проекта</label>
                                        <input type="date" name="project_date" id="project_date"
                                               class="form-control"
                                               value="{{ old('project_date', $item->project_date ? $item->project_date->format('Y-m-d') : '') }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="link" class="form-label">Ссылка на проект</label>
                                    <input type="url" name="link" id="link"
                                           class="form-control" value="{{ old('link', $item->link) }}">
                                </div>


                                <!-- Категории для фильтрации -->
                                <div class="mb-3">
                                    <label class="form-label">Категории (для фильтрации)</label>
                                    <div class="border rounded p-3">
                                        @php
                                            $currentSlugs = $item->tags ? array_map('trim', explode(',', $item->tags)) : [];
                                        @endphp
                                        @foreach($categories as $category)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox"
                                                       name="categories[]"
                                                       id="cat_{{ $category->id }}"
                                                       value="{{ $category->slug }}"
                                                       class="form-check-input"
                                                    {{ in_array($category->slug, $currentSlugs) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="cat_{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <small class="form-text text-muted">
                                        Отметьте все категории, к которым относится работа.
                                    </small>
                                </div>                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Настройки</h6>

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">
                                                Основная категория <span class="text-danger">*</span>
                                            </label>
                                            <select name="category_id" id="category_id"
                                                    class="form-select @error('category_id') is-invalid @enderror" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="order" class="form-label">Порядок</label>
                                            <input type="number" name="order" id="order"
                                                   class="form-control" value="{{ old('order', $item->order) }}" min="0">
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="is_active" value="0">
                                                <input type="checkbox" name="is_active" id="is_active"
                                                       class="form-check-input" value="1"
                                                    {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Активна
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
                            <a href="{{ route('admin.gallery.items.index') }}" class="btn btn-secondary">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
