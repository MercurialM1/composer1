@extends('admin.index')
@section('content')
    @include('admin.slider.components.datatable', ['sliders' => $sliders]) {{-- добавляет копоненты--}}
@endsection
