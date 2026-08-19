<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Управление слайдами - CORK Admin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('layouts/vertical-dark-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-dark-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/vertical-dark-menu/loader.js') }}"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/splide/splide.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/splide/custom-splide.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/splide/custom-splide.min.css') }}">

    <style>
        .slide-preview {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .btn-action {
            margin: 0 2px;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-item flex-row ms-lg-auto ms-0">
            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown">
                    <div class="avatar-container">
                        <div class="avatar avatar-sm avatar-indicators avatar-online">
                            <img alt="avatar" src="{{ asset('src/assets/img/profile-30.png') }}" class="rounded-circle">
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="dropdown-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>Log Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>

<!-- MAIN CONTAINER -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!-- SIDEBAR -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="navbar-nav theme-brand flex-row text-center">
                <div class="nav-logo">
                    <div class="nav-item theme-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('src/assets/img/logo.svg') }}" class="navbar-logo" alt="logo">
                        </a>
                    </div>
                    <div class="nav-item theme-text">
                        <a href="{{ url('/') }}" class="nav-link"> CORK </a>
                    </div>
                </div>
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <!-- Слайды -->
                <li class="menu {{ Request::is('admin/slides*') ? 'active' : '' }}">
                    <a href="#sliders" data-bs-toggle="collapse" aria-expanded="{{ Request::is('admin/slides*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Слайды</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('admin/slides*') ? 'show' : '' }}" id="sliders" data-bs-parent="#accordionExample">
                        <li class="{{ Request::routeIs('admin.slides.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.slides.index') }}"> Все слайды </a>
                        </li>
                        <li class="{{ Request::routeIs('admin.slides.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.slides.create') }}"> Добавить слайд </a>
                        </li>
                    </ul>
                </li>

                <!-- Видео -->
                <li class="menu {{ Request::is('admin/videos*') ? 'active' : '' }}">
                    <a href="#videos" data-bs-toggle="collapse" aria-expanded="{{ Request::is('admin/videos*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                            </svg>
                            <span>Видео</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('admin/videos*') ? 'show' : '' }}" id="videos" data-bs-parent="#accordionExample">
                        <li class="{{ Request::routeIs('admin.videos.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.videos.index') }}"> Все видео </a>
                        </li>
                        <li class="{{ Request::routeIs('admin.videos.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.videos.create') }}"> Добавить видео </a>
                        </li>
                    </ul>
                </li>
                <!-- Галерея -->
                <li class="menu {{ Request::is('admin/gallery*') ? 'active' : '' }}">
                    <a href="#gallery" data-bs-toggle="collapse" aria-expanded="{{ Request::is('admin/gallery*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Галерея</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('admin/gallery*') ? 'show' : '' }}" id="gallery" data-bs-parent="#accordionExample">
                        <li class="{{ Request::routeIs('admin.gallery.categories.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.gallery.categories.index') }}"> Категории </a>
                        </li>
                        <li class="{{ Request::routeIs('admin.gallery.items.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.gallery.items.index') }}"> Работы </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <!-- CONTENT AREA -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">
                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Слайды')</li>
                        </ol>
                    </nav>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Успешно!</strong> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Ошибка!</strong> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p>Copyright © <span class="dynamic-year">{{ date('Y') }}</span> DesignReset</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
<script src="{{ asset('layouts/vertical-dark-menu/app.js') }}"></script>
<script src="{{ asset('src/plugins/src/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('src/plugins/src/splide/splide.min.js') }}"></script>

@stack('scripts')
</body>
</html>
