@extends('index')
@section('content')

        @include('components.nonUnique.navbar')


        @include('components.nonUnique.MeetOurTeam')        <!-- /.light-wrapper -->

        @include('components.about1')        <!-- /.parallax -->

        @include('components.contactus')        <!-- /.light-wrapper -->

        @include('components.nonUnique.Clients')        <!-- /.light-wrapper -->



@endsection
