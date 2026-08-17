@extends('index')
    @section('content')

    @include('components.nonUnique.header')      <!-- /.navbar-collapse -->

    @include('components.nonUnique.movebanner')    <!-- /.revolution -->

    @include('components.nonUnique.welcome')    <!-- /.light-wrapper -->

    @include('components.nonUnique.richLayouts')    <!-- /.inverse-wrapper -->

    @include('components.nonUnique.productgallery')

    @include('components.nonUnique.VideoParalax')<!-- /.light-wrapper -->


        <!-- /.inverse-wrapper -->

    @include('components.nonUnique.timeline')    <!-- /.light-wrapper -->

    @include('components.nonUnique.aboutTheCompany')

    <!-- /.white-wrapper -->

    @include('components.nonUnique.ProcessModel')    <!-- /.light-wrapper -->

    @include('components.nonUnique.MeetOurTeam')


    @endsection
