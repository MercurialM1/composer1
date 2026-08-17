@extends('index')
    @section('content')

    @include('components.nonUnique.navbar')

    @include('components.nonUnique.movebanner')
    <!-- /.revolution -->

    @include('components.nonUnique.welcome')    <!-- /.light-wrapper -->

    @include('components.nonUnique.richLayouts')
    <!-- /.inverse-wrapper -->

    @include('components.nonUnique.productgallery')    <!-- /.light-wrapper -->


    @include('components.nonUnique.VideoParalax')    <!-- /.inverse-wrapper -->

    @include('components.nonUnique.timeline')    <!-- /.light-wrapper -->

    @include('components.nonUnique.aboutTheCompany')    <!-- /.white-wrapper -->

    @include('components.nonUnique.ProcessModel')    <!-- /.light-wrapper -->

    @include('components.nonUnique.MeetOurTeam')    <!-- /.light-wrapper -->

    @endsection
      <!-- /footer -->
