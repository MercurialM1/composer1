<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ route ('admin.slider.index')}}">
                        <img src="{{asset('src/assets/img/logo.svg')}}" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{ route ('admin.slider.index') }}" class="nav-link">ADMIN</a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
            <li class="menu {{ request()->routeIs('admin.slider.index') ? 'active' : '' }}"> {{-- что бы не светилась всегда --}}
                <a href="#slider-menu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        <span>Слайдер</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->routeIs('admin.slider.*') ? 'show' : '' }}" id="slider-menu" data-bs-parent="#accordionExample">
                    <li class="{{ request()->routeIs('admin.slider.create') ? 'active' : '' }}">
                        <a href="{{route('admin.slider.create')}}"> Создание </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.slider.index') ? 'active' : '' }}">
                        <a href="{{route('admin.slider.index')}}">Все слайдеры</a>
                    </li>
                </ul>
            </li>



            <li class="menu {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                <a href="#gallery-menu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span>Галерея</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->routeIs(['admin.category.*','admin.photo.*']) ? 'show' : '' }}" id="gallery-menu" data-bs-parent="#accordionExample">
                    <li class="{{ request()->routeIs('category.create') ? 'active' : '' }}">
                        <a href="{{route('admin.category.create')}}"> Создание категори </a>
                    </li>

                    <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <a href="{{route('admin.category.index')}}">Все категории</a>
                    </li>
                    <li class="{{ request()->routeIs('photo.create') ? 'active' : '' }}">
                        <a href="{{route('admin.photo.create')}}">Фото</a>
                    </li>
                    <li class="{{ request()->routeIs('photo.index') ? 'active' : '' }}">
                        <a href="{{route('admin.photo.index')}}">Все фото</a>
                    </li>
                </ul>
            </li>


            <li class="menu {{ request()->routeIs('admin.contactus.index') ? 'active' : '' }}"> {{-- что бы не светилась всегда --}}
                <a href="#contact-menu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>Контакт</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>{{--что бы было открыто когда она выбрана --}}
                <ul class="collapse submenu list-unstyled {{ request()->routeIs('contactus.*') ? 'show' : '' }}" id="contact-menu" data-bs-parent="#accordionExample">
                    <li class="{{ request()->routeIs('admin.contactus.index') ? 'active' : '' }}">
                        <a href="{{route('admin.contactus.index')}}">Сообщения</a>
                    </li>
                </ul>
            </li>
        </ul>


    </nav>
    <div class="overlay"></div>
</div>
