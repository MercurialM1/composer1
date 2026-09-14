<nav class="navbar navbar-inverse fixed">
    <div class="container">
        <div class="navbar-header">
            <div class="basic-wrapper"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
                <div class="navbar-brand"> <a href="{{url('/')}}"><img src="#" srcset="style/images/logo-dark.png 1x, style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
                <!-- /.navbar-brand -->
            </div>
            <!-- /.basic-wrapper -->
        </div>
        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                        <li><a href="{{ url('cabinet') }}">Главная</a></li>
                        <li><a href="{{ url('cabinet/cart') }}">Корзина</a></li>
                        <li><a href="{{ url('cabinet/shop') }}">Товары</a></li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->
