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
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/plugins.css') }}" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="{{ asset('style/css/color/green.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <link href="{{ asset('style/type/icons.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="onepage">
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<div class="body-wrapper">
    <nav class="navbar navbar-default default">
        <div class="container">
            <div class="navbar-header">
                <div class="basic-wrapper"><a class="btn responsive-menu" data-toggle="collapse"
                                              data-target=".navbar-collapse"><i></i></a>
                    <div class="navbar-brand"><a href="onepage.html"><img src="#"
                                                                          srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x"
                                                                          class="logo-light" alt=""/><img src="#"
                                                                                                          srcset="style/images/logo-dark.png 1x, style/images/logo-dark@2x.png 2x"
                                                                                                          class="logo-dark"
                                                                                                          alt=""/></a>
                    </div>
                    <!-- /.navbar-brand -->
                </div>
                <!-- /.basic-wrapper -->
            </div>
            <!-- /.navbar-header -->
            @include('components.nonUnique.header')      <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->

    <section id="home">
        <div class="tp-fullscreen-container revolution">
            <div class="tp-fullscreen">
                <ul>
                    <li data-transition="fade"><img src="{{ asset('style/images/art/slider-bg1.jpg') }}" alt=""
                                                    data-bgposition="center top" data-bgfit="cover"
                                                    data-bgrepeat="no-repeat"/>
                        <div class="tp-caption large sfb text-center" data-x="center" data-y="263" data-speed="900"
                             data-start="800" data-easing="Sine.easeOut">Quality. Flexibility. Customizability
                        </div>
                        <div class="tp-caption medium sfb text-center" data-x="center" data-y="348" data-speed="900"
                             data-start="1500" data-easing="Sine.easeOut">great solution for your business, portfolio,
                            blog or any other purpose website
                        </div>
                        <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200"
                             data-easing="Sine.easeOut" data-endspeed="100"><a href="#"
                                                                               class="btn btn-large btn-border">Purchase
                                Now</a></div>
                    </li>
                    <li data-transition="fade"><img src="{{ asset('style/images/art/slider-bg2.jpg') }}" alt=""
                                                    data-bgposition="center top" data-bgfit="cover"
                                                    data-bgrepeat="no-repeat"/>
                        <div class="tp-caption large sfl text-center" data-x="center" data-y="263" data-speed="900"
                             data-start="800" data-easing="Sine.easeOut">Build your professional website
                        </div>
                        <div class="tp-caption medium sfr text-center" data-x="center" data-y="343" data-speed="900"
                             data-start="1500" data-easing="Sine.easeOut">Create a unique website easily with the help
                            of tons of features
                        </div>
                        <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200"
                             data-easing="Sine.easeOut" data-endspeed="100"><a href="#" class="btn btn-large">View
                                Features</a></div>
                    </li>
                    <li data-transition="fade"><img src="{{ asset('style/images/art/slider-bg3.jpg') }}" alt=""
                                                    data-bgposition="center top" data-bgfit="cover"
                                                    data-bgrepeat="no-repeat"/>
                        <div class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800"
                             data-easing="Sine.easeOut">Free updates & <br/>
                            premium support
                        </div>
                        <div class="tp-caption medium sfr" data-x="30" data-y="403" data-speed="900" data-start="1500"
                             data-easing="Sine.easeOut">You will have access to all updates and free support
                        </div>
                        <div class="tp-caption sfr" data-x="30" data-y="470" data-speed="900" data-start="2200"
                             data-easing="Sine.easeOut" data-endspeed="100"><a href="#" class="btn btn-large">Purchase
                                Now</a></div>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
            <!-- /.tp-fullscreen-container -->
        </div>
        <!-- /.revolution -->
    </section>
    <!--/#home -->

    <section id="services">
        <div class="light-wrapper">
            <div class="container inner">
                <div class="headline text-center">
                    <h2>Hello! Welcome to Hygge</h2>
                    <p class="lead animated-text letters type">
                        <span>a multipurpose HTML5 template which is suitable for</span> <span
                                class="animated-text-wrapper waiting"> <b class="is-visible">creative agencies</b> <b>personal blogs</b> <b>digital studios</b> <b>or any business owners</b> </span>
                    </p>
                </div>
                <div class="divide30"></div>
                <div class="row services">
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-web-browser.png') }}" alt=""/>
                            </div>
                            <h4>Responsive Layout</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-paint-palette.png') }}"
                                                   alt=""/></div>
                            <h4>Color Palette</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-coding.png') }}" alt=""/>
                            </div>
                            <h4>Clear Coding</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                </div>
                <!-- /.row -->
                <div class="divide30"></div>
                <div class="row services">
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-chats.png') }}" alt=""/></div>
                            <h4>Personal Support</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-tv.png') }}" alt=""/></div>
                            <h4>Video Support</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                    <div class="col-sm-4">
                        <div class="service text-center">
                            <div class="icon"><img src="{{ asset('style/images/icons/lulu-clipboard.png') }}" alt=""/>
                            </div>
                            <h4>Extensive Documentation</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac
                                cursus commodo.</p>
                        </div>
                        <!--/.service -->
                    </div>
                    <!--/column -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /.light-wrapper -->
    </section>
    <!--/#services -->

    <div class="inverse-wrapper inner bp0">
        <div class="container">
            <div class="thin text-center">
                <div class="headline text-center">
                    <h2>Rich layouts & unlimited combinations</h2>
                    <p class="lead">Create a unique website easily with the help of tons of features</p>
                </div>
                <!-- /.headline -->
                <div class="divide30"></div>
                <figure><img src="{{ asset('style/images/art/hygge.png') }}" alt=""/></figure>
            </div>
            <!-- /.thin -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /.inverse-wrapper -->

    <section id="portfolio">
        <div class="light-wrapper">
            <div class="container inner">
                <div class="section-title text-center">
                    <h3>The Product Gallery</h3>
                    <p class="lead">awesome products prepared with creative ideas and great design</p>
                </div>
                <div class="cbp-panel">
                    <div id="filters-container" class="cbp-filter-container text-center">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All</div>
                        <div data-filter=".print" class="cbp-filter-item"> Print</div>
                        <div data-filter=".web" class="cbp-filter-item"> Web Design</div>
                        <div data-filter=".logo" class="cbp-filter-item"> Logo</div>
                        <div data-filter=".motion" class="cbp-filter-item"> Motion</div>
                    </div>
                    <div id="grid-container" class="cbp">
                        <div class="cbp-item print motion"><a href="ajax/project1.html"
                                                              class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p1.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Malesuada Parturient</div>
                                            <div class="cbp-l-caption-desc">Print, Motion</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                        <div class="cbp-item web logo"><a href="ajax/project2.html"
                                                          class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p2.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Tellus Nibh</div>
                                            <div class="cbp-l-caption-desc">Web Design</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                        <div class="cbp-item print motion"><a href="ajax/project3.html"
                                                              class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p3.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Pellentesque Mattis</div>
                                            <div class="cbp-l-caption-desc">Print, Motion</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                        <div class="cbp-item web print"><a href="ajax/project4.html"
                                                           class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p4.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Euismod Pharetra</div>
                                            <div class="cbp-l-caption-desc">Web Design, Print</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                        <div class="cbp-item motion logo"><a href="ajax/project5.html"
                                                             class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p5.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Fringilla Nullam</div>
                                            <div class="cbp-l-caption-desc">Motion</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                        <div class="cbp-item print motion"><a href="ajax/project6.html"
                                                              class="cbp-caption cbp-singlePageInline">
                                <div class="cbp-caption-defaultWrap"><img src="{{ asset('style/images/art/p6.jpg') }}"
                                                                          alt=""/></div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Pharetra Sem</div>
                                            <div class="cbp-l-caption-desc">Print, Motion</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <!--/.cbp-item -->
                    </div>
                    <!--/.cbp -->
                    <div class="divide30"></div>
                    <div class="text-center">
                        <div id="loadMore-container" class=""><a href="ajax/loadmore.html"
                                                                 class="cbp-l-loadMore-link btn btn-border dark"> <span
                                        class="cbp-l-loadMore-defaultText">LOAD MORE</span> <span
                                        class="cbp-l-loadMore-loadingText">LOADING...</span> <span
                                        class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span> </a></div>
                    </div>
                    <!--/.text-center -->
                </div>
                <!--/.cbp-panel -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.light-wrapper -->
    </section>
    <!--/#portfolio -->

    <div class="parallax parallax1">
        <div class="container inner bp0">
            <div class="row">
                <div class="col-md-6 col-md-push-6">
                    <div class="divide50"></div>
                    <div class="headline">
                        <h2>Hygge is a responsive template</h2>
                        <p class="lead">The layout will adapt to different screen sizes which will make your website
                            compatible with any device such as smart phones, tablets and desktop computers.</p>
                        <div class="divide25"></div>
                        <a href="#" class="btn">Check more</a></div>
                </div>
                <!-- /column -->
                <div class="col-md-6 col-md-pull-6 text-center"><img src="{{ asset('style/images/art/tablet.png') }}"
                                                                     class="main" alt=""/></div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.parallax -->

    <section id="about">
        <div class="light-wrapper">
            <div class="container inner">
                <div class="section-title text-center">
                    <h3>Meet Our Team</h3>
                </div>
                <div class="row grid-view">
                    <div class="col-sm-3 text-center">
                        <figure><img src="{{ asset('style/images/art/t1.jpg') }}" alt=""/></figure>
                        <h4 class="post-title">Nikolas Brooten</h4>
                        <div class="meta">Sales Manager</div>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo.</p>
                        <ul class="social">
                            <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                        </ul>
                    </div>
                    <!-- /column -->
                    <div class="col-sm-3 text-center">
                        <figure><img src="{{ asset('style/images/art/t2.jpg') }}" alt=""/></figure>
                        <h4 class="post-title">Coriss Ambady</h4>
                        <div class="meta">Marketing Specialist</div>
                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere quam.</p>
                        <ul class="social">
                            <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-s-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- /column -->
                    <div class="col-sm-3 text-center">
                        <figure><img src="{{ asset('style/images/art/t3.jpg') }}" alt=""/></figure>
                        <h4 class="post-title">Barclay Widerski</h4>
                        <div class="meta">Computer Engineer</div>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Vestibulum id ligula porta felis.</p>
                        <ul class="social">
                            <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-s-github"></i></a></li>
                            <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                        </ul>
                    </div>
                    <!-- /column -->
                    <div class="col-sm-3 text-center">
                        <figure><img src="{{ asset('style/images/art/t4.jpg') }}" alt=""/></figure>
                        <h4 class="post-title">Elsie Spear</h4>
                        <div class="meta">Strategy Director</div>
                        <p>Maecenas faucibus mollis interdum. Aenean eu leo quam ornare sem lacinia.</p>
                        <ul class="social">
                            <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-s-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- /column -->
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->
        </div>
        <!-- /.light-wrapper -->
    </section>
    <!--/#about -->

    <div class="white-wrapper">
        <div class="col-image">
            <div class="bg-wrapper col-md-6">
                <div class="bg-holder" style="background-image: url(style/images/art/about.jpg);"></div>
            </div>
            <!--/.bg-wrapper -->
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-7 inner-col">
                        <div class="section-title">
                            <h3>About the Company</h3>
                        </div>
                        <p class="lead">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa.</p>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean
                            eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec ullamcorper
                            nulla non metus auctor fringilla. Etiam porta sem malesuada magna mollis euismod.</p>
                        <ul class="progress-list">
                            <li>
                                <p>Strategy <em>90%</em></p>
                                <div class="progress plain">
                                    <div class="bar" style="width: 90%;"></div>
                                </div>
                            </li>
                            <li>
                                <p>Project Management <em>80%</em></p>
                                <div class="progress plain">
                                    <div class="bar" style="width: 80%;"></div>
                                </div>
                            </li>
                            <li>
                                <p>Programming <em>85%</em></p>
                                <div class="progress plain">
                                    <div class="bar" style="width: 85%;"></div>
                                </div>
                            </li>
                            <li>
                                <p>Analytics & Reporting <em>75%</em></p>
                                <div class="progress plain">
                                    <div class="bar" style="width: 50%;"></div>
                                </div>
                            </li>
                        </ul>
                        <!-- /.progress-list -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->
        </div>
        <!--/.col-image -->

    </div>
    <!-- /.white-wrapper -->

    <section id="journal">
        <div class="light-wrapper">
            <div class="container inner">
                <div class="section-title text-center">
                    <h3>Timeline Blog</h3>
                    <p class="lead">display your journal entries in a timeline fashion</p>
                </div>
                <div class="timeline">
                    <div class="date-title"><span>March 2015</span></div>
                    <div class="row">
                        <div class="col-sm-6 timeline-item">
                            <div class="arrow"></div>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-sm-3 col-md-5">
                                        <figure><a href="#">
                                                <div class="text-overlay">
                                                    <div class="info"><span>Read More</span></div>
                                                </div>
                                                <img src="{{ asset('style/images/art/tb1.jpg') }}" alt=""/></a></figure>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-sm-9 col-md-7">
                                        <h4 class="post-title"><a href="#">Curabitur Blandit Tempus</a></h4>
                                        <div class="meta"><span class="date"><a href="#" class="link-effect">30 March 2015</a></span><span
                                                    class="category"><a href="#"
                                                                        class="link-effect">Journal</a></span><span
                                                    class="comments"><a href="#" class="link-effect"><i
                                                            class="icon-chat-1"></i> 8</a></span></div>
                                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus.</p>
                                        <a href="#" class="more link-effect">Read More »</a></div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /column -->
                        <div class="col-sm-6 timeline-item right">
                            <div class="arrow"></div>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-sm-3 col-md-5">
                                        <figure><a href="#">
                                                <div class="text-overlay">
                                                    <div class="info"><span>Read More</span></div>
                                                </div>
                                                <img src="{{ asset('style/images/art/tb2.jpg') }}" alt=""/></a></figure>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-sm-9 col-md-7">
                                        <h4 class="post-title"><a href="#">Mollis Euismod Fringilla</a></h4>
                                        <div class="meta"><span class="date"><a href="#" class="link-effect">22 March 2015</a></span><span
                                                    class="category"><a href="#"
                                                                        class="link-effect">Journal</a></span><span
                                                    class="comments"><a href="#" class="link-effect"><i
                                                            class="icon-chat-1"></i> 8</a></span></div>
                                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus.</p>
                                        <a href="#" class="more link-effect">Read More »</a></div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                    <div class="date-title"><span>February 2015</span></div>
                    <div class="row">
                        <div class="col-sm-6 timeline-item">
                            <div class="arrow"></div>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-sm-3 col-md-5">
                                        <figure><a href="#">
                                                <div class="text-overlay">
                                                    <div class="info"><span>Read More</span></div>
                                                </div>
                                                <img src="{{ asset('style/images/art/tb5.jpg') }}" alt=""/></a></figure>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-sm-9 col-md-7">
                                        <h4 class="post-title"><a href="#">Dapibus Quam Ligula</a></h4>
                                        <div class="meta"><span class="date"><a href="#" class="link-effect">11 Februay 2015</a></span><span
                                                    class="category"><a href="#"
                                                                        class="link-effect">Journal</a></span><span
                                                    class="comments"><a href="#" class="link-effect"><i
                                                            class="icon-chat-1"></i> 8</a></span></div>
                                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus.</p>
                                        <a href="#" class="more link-effect">Read More »</a></div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /column -->
                        <div class="col-sm-6 timeline-item right">
                            <div class="arrow"></div>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-sm-3 col-md-5">
                                        <figure><a href="#">
                                                <div class="text-overlay">
                                                    <div class="info"><span>Read More</span></div>
                                                </div>
                                                <img src="{{ asset('style/images/art/tb6.jpg') }}" alt=""/></a></figure>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-sm-9 col-md-7">
                                        <h4 class="post-title"><a href="#">Fusce Malesuada Cursus</a></h4>
                                        <div class="meta"><span class="date"><a href="#" class="link-effect">3 February 2015</a></span><span
                                                    class="category"><a href="#"
                                                                        class="link-effect">Journal</a></span><span
                                                    class="comments"><a href="#" class="link-effect"><i
                                                            class="icon-chat-1"></i> 8</a></span></div>
                                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus.</p>
                                        <a href="#" class="more link-effect">Read More »</a></div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.timeline -->
            </div>
            <!-- /.container -->

        </div>
        <!-- /.light-wrapper -->
    </section>
    <!--/#journal -->

    <div class="outer-wrap inverse-wrapper">
        <div id="video-wrap" class="video-wrap">
            <video preload="metadata" playsinline autoplay muted loop id="video-office">
                <source src="{{ asset('style/video/office.mp4') }}" type="video/mp4">
                <source src="{{ asset('style/video/office.webm') }}" type="video/webm">
            </video>
            <div class="content-overlay container">
                <div class="headline text-center">
                    <h2>Video Parallax</h2>
                    <p class="lead"> For better visualization of your company </p>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.video-wrap -->
    </div>
    <!-- /.inverse-wrapper -->

    <section id="contact">
        <div class="light-wrapper">
            <div class="container inner">
                <div class="thin">
                    <div class="section-title text-center">
                        <h3>Get in Touch</h3>
                        <p class="lead">feel free to drop us a line to contact us</p>
                    </div>
                    <p class="text-center">Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit
                        libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia.</p>
                    <ul class="contact-info text-center">
                        <li><i class="icon-location"></i>Moonshine St. 14/05 Light City</li>
                        <li><i class="icon-phone"></i>+00 (123) 456 78 90</li>
                        <li><i class="icon-mail"></i><a href="first.last@email.com">first.last@email.com</a></li>
                    </ul>
                    <div class="divide50"></div>
                    <div class="form-container">
                        <form action="contact/vanilla-form.php" method="post" class="vanilla vanilla-form"
                              novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-field">
                                        <label>
                                            <input type="text" name="name" placeholder="Your name" required="required">
                                            <i class="icon-user"></i></label>
                                    </div>
                                    <!--/.form-field -->
                                </div>
                                <!--/column -->
                                <div class="col-sm-6">
                                    <div class="form-field">
                                        <label>
                                            <input type="email" name="email" placeholder="Your e-mail"
                                                   required="required">
                                            <i class="icon-mail-alt"></i></label>
                                    </div>
                                    <!--/.form-field -->
                                </div>
                                <!--/column -->
                                <div class="col-sm-6">
                                    <div class="form-field">
                                        <label>
                                            <input type="tel" name="tel" placeholder="Phone">
                                            <i class="icon-phone"></i></label>
                                    </div>
                                    <!--/.form-field -->
                                </div>
                                <!--/column -->
                                <div class="col-sm-6">
                                    <div class="form-field">
                                        <label class="custom-select">
                                            <select name="department" required="required">
                                                <option value="">Select Department</option>
                                                <option value="Sales">Sales</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Support">Customer Support</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <i class="icon-ok"></i><span><!-- fake select handler --></span> </label>
                                    </div>
                                    <!--/.form-field -->
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                            <textarea name="message" placeholder="Type your message here..."></textarea>
                            <div class="radio-set">
                                <label>Subject:</label>
                                <label>
                                    <input type="radio" name="subject" value="General">
                                    <span><!-- fake radio --></span> General</label>
                                <label>
                                    <input type="radio" name="subject" value="Hi">
                                    <span><!-- fake radio --></span> Say Hi</label>
                                <label>
                                    <input type="radio" name="subject" value="Other">
                                    <span><!-- fake radio --></span> Other</label>
                            </div>
                            <!--/.radio-set -->
                            <input type="submit" class="btn" value="Send" data-error="Fix errors"
                                   data-processing="Sending..." data-success="Thank you!">
                            <footer class="notification-box"></footer>
                        </form>
                        <!--/.vanilla-form -->
                    </div>
                    <!--/.form-container -->
                </div>
                <!-- /.thin -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.light-wrapper -->
    </section>
    <!--/#contact -->

    <div class="white-wrapper">
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2499.4483800426133!2d3.2241689!3d51.2108153!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c350cfcf934d7d%3A0xa4d8f385ffa7d70b!2sChoco-Story!5e0!3m2!1sen!2str!4v1534408440419"
                    width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="text">
                <div class="inner-col">
                    <div class="section-title">
                        <h3>Get in Touch</h3>
                    </div>
                    <!-- /.section-title -->
                    <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam id dolor id nibh ultricies
                        vehicula ut id elit.</p>
                    <div class="contact-info"><i class="icon-location"></i> Moonshine St. 14/05 Light City <br>
                        <i class="icon-phone"></i>+00 (123) 456 78 90 <br>
                        <i class="icon-mail"></i> <a href="first.last@email.com">first.last@email.com</a></div>
                    <!-- /.contact-info -->
                </div>
                <!-- /.text -->

            </div>
            <!-- /.map-wrapper -->
        </div>

    </div>
    <!-- /.white-wrapper -->

    @include('components.nonUnique.footer')  <!-- /footer -->
    <div id="share-bar"></div>
</div>
<!--/.body-wrapper -->
<script src="{{ asset('style/js/jquery.min.js') }}"></script>
<script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('style/js/plugins.js') }}"></script>
<script src="{{ asset('style/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('style/js/scripts.js') }}"></script>
</body>
</html>
