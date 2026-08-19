@extends('admin.slides.admin')

@section('page-title', 'Работы галереи')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                            <h4>Все работы ({{ $items->count() }})</h4>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-end">
                            <a href="{{ route('admin.gallery.items.create') }}" class="btn btn-primary">
                                + Добавить работу
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    @if($items->isEmpty())
                        <div class="text-center py-5">
                            <h5 class="text-muted">Работ пока нет</h5>
                            <a href="{{ route('admin.gallery.items.create') }}" class="btn btn-primary mt-3">
                                Добавить первую работу
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Изображение</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Клиент</th>
                                    <th>Порядок</th>
                                    <th>Статус</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                     alt="{{ $item->title }}"
                                                     class="slide-preview">
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $item->title }}</strong>
                                            <br>
                                            <small class="text-muted">
                                                {{ Str::limit($item->description, 40) }}
                                            </small>
                                        </td>
                                        <td>
                                        <span class="badge bg-primary">
                                            {{ $item->category->name }}
                                        </span>
                                        </td>
                                        <td>{{ $item->client ?? '—' }}</td>
                                        <td><span class="badge bg-info">{{ $item->order }}</span></td>
                                        <td>
                                            @if($item->is_active)
                                                <span class="badge bg-success">Активна</span>
                                            @else
                                                <span class="badge bg-danger">Неактивна</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.gallery.items.edit', $item) }}"
                                               class="btn btn-sm btn-info">✏️</a>
                                            <form action="{{ route('admin.gallery.items.destroy', $item) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Удалить работу?')">
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
