<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Majestic cafe</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js'])
</head>


<body class="index-page">
    <div class="wrapper">
        <header id="header" class="header d-flex align-items-center sticky-top" {{-- style="background-color: #fffaf2" --}}>
            <div class="container position-relative d-flex align-items-center">

                <a href="{{ route('home') }}"
                    class="heading-logo-hovered logo d-flex align-items-center me-auto me-xl-0"
                    style="padding-right:20px; padding-bottom:5px;">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1 style="color: #9bbb30 !important;">Majestic cafe</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('menu') }}">Меню</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="{{ route('subcategory.index') }}">
                                            {{ __('Подкатегории') }}
                                        </a></li>
                                    <li> <a href="{{ route('item.index') }}">
                                            {{ __('Артикули') }}
                                        </a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest

                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </header>

        <main class="main content">
            @yield('content')
        </main>
        {{--  <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
 --}}

        <footer id="footer" class="footer dark-background mt-3">

            <div class="container">
                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6 d-flex">
                        <i class="bi bi-geo-alt icon"></i>
                        <div class="address">
                            <h4>Адрес</h4>
                            <p>ул. „Одеса“ 8</p>
                            <p>Южен, Пловдив</p>
                            <p></p>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 d-flex">
                        <i class="bi bi-telephone icon"></i>
                        <div>
                            <h4>Контакти</h4>
                            <p>
                                <strong>Телефон:</strong> <span>0887 909 707</span><br>
                                <strong>Имейл:</strong> <span>contact@majesticcafe.eu</span><br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex">
                        <i class="bi bi-clock icon"></i>
                        <div>
                            <h4>Работно време</h4>
                            <p>
                                <strong>пон - пет:</strong> <span>8:00ч. - 22:00ч.</span><br>
                                <strong>съб - нед:</strong>: <span>10:00ч. - 22:00ч.</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h4>Последвайте ни</h4>
                        <div class="social-links d-flex">
                            <a href="https://www.facebook.com/majesticcafe2018/?locale=bg_BG" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/cafe_majestic?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
        @stack('scripts')
    </div>
</body>

</html>
