@extends('admin.index')
@section('content')
    @include('admin.contact.components.datatable',['contacts' => $contact])
@endsection
