@extends('admin.index')
@section('content')
    @include('admin.product.category.components.datatable',['categories' => $categories])
@endsection
