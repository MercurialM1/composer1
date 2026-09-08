<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('style/images/favicon.png') }}">
    <title>Hygge</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset("/style.css") }}" rel="stylesheet">
    <link href="{{ asset ('/style/css/color/green.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <link href="{{asset('/style/type/icons.css') }}" rel="stylesheet">
</head>
<body>
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

@include('components.nonUnique.header')

@yield('content')

@include('components.nonUnique.footer')
<!--/.body-wrapper -->
<script src="{{ asset("/style/js/jquery.min.js") }}"></script>
<script src="{{ asset('/style/js/bootstrap.min.js') }}"></script>
<script src="{{ asset("/style/js/plugins.js") }}"></script>
<script src="{{ asset("/style/js/jquery.themepunch.tools.min.js") }}"></script>
<script src="{{ asset("/style/js/scripts.js") }}"></script>

</body>
</html>
