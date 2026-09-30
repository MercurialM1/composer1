@extends('admin.index')
@section('content')
@include('admin.order.components.dashboard')
@endsection
@section('style')
        <link rel="stylesheet" href="{{ asset('public/style.css') }}">
@endsection
