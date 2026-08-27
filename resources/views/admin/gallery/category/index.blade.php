@extends('admin.index')
@section('content')
    @include('admin.gallery.category.components.datatable',['categories' => $categories])
@endsection
