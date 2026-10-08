@extends('admin.index')
@section('content')
@include('admin.order.components.dashboard')
@endsection
@section('style')
        <link rel="stylesheet" href="{{ asset('public/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
@endsection
