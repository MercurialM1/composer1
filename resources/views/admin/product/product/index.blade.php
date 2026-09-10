@extends('admin.index')
@section('content')
    @include('admin.product.product.components.datatable',['products' => $products])
@endsection
