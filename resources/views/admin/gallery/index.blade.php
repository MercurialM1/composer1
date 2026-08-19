@extends('admin.slides.admin')

@section('page-title', 'Категории галереи')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                            <h4>Все категории ({{ $categories->count() }})</h4>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-end">
                            <a href="{{ route('admin.gallery.categories.create') }}" class="btn btn-primary">
                                + Добавить категорию
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    @if($categories->isEmpty())
                        <div class="text-center py-5">
                            <h5 class="text-muted">Категорий пока нет</h5>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Slug</th>
                                    <th>Порядок</th>
                                    <th>Работ</th>
                                    <th>Статус</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><strong>{{ $category->name }}</strong></td>
                                        <td><code>{{ $category->slug }}</code></td>
                                        <td><span class="badge bg-info">{{ $category->order }}</span></td>
                                        <td><span class="badge bg-secondary">{{ $category->items->count() }}</span></td>
                                        <td>
                                            @if($category->is_active)
                                                <span class="badge bg-success">Активна</span>
                                            @else
                                                <span class="badge bg-danger">Неактивна</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.gallery.categories.edit', $category) }}"
                                               class="btn btn-sm btn-info">✏️</a>
                                            <form action="{{ route('admin.gallery.categories.destroy', $category) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Удалить категорию?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
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
