@extends('index')
    @section('content')
        @include('components.nonUnique.navbar')

        @include('components.nonUnique.googleMaps')

        @include('components.getintouch')

    @include('components.nonUnique.footer')
    @endsection
