@extends('index')
    @section('content')

    @include('components.nonUnique.navbar')  <!-- /.navbar -->


    @include('components.responLayout')

    @include('components.nonUnique.responive')    <!-- /.parallax -->

    @include('components.nonUnique.Prices')
 <!-- /footer -->
    @include('components.nonUnique.CoreFeatures')
@endsection
