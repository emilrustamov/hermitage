<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper p-0">
        <div>
            <header>
                @if ($slider)
                    @include('layouts.head_slider')
                @endif
                <div class="header-content">
                    <div class="d-flex">
                        <nav role="navigation">
                            <div id="menuToggle">
                                <input type="checkbox" />
                                <span></span>
                                <span></span>
                                <span></span>
                                <ul id="menu">
                                    <a class="nav-link" href="{{ route('vacancies.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Вакансии</li>
                                    </a>
                                    <a class="nav-link" href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Блог</li>
                                    </a>
                                    <a class="nav-link" href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Проекты</li>
                                    </a>
                                    <a class="nav-link" href="{{ route('about', ['locale' => app()->getLocale()]) }}">
                                        <li>О нас</li>
                                    </a>
                                </ul>
                            </div>
                        </nav>
                        <div style="display: inline-flex">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ asset('/images/logo.svg') }}"  style="filter:invert(1)" alt="logo" class="logo"></a>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="languageDropdown">
                                {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a class="dropdown-item" href="#" data-lang="ru">RU</a>
                                <a class="dropdown-item" href="#" data-lang="en">EN</a>
                                <a class="dropdown-item" href="#" data-lang="tk">TK</a>
                            </div>
                        </div>
                        <a href="{{ route('register') }}"><i class="fa fa-user punkt-menu" aria-hidden="true" style="color:white"></i></a>
                        <i class="fa fa-shopping-cart punkt-menu" aria-hidden="true" style="color:white" id="cartIcon"></i>
                        <a href="/favorites"><i class="fa fa-heart punkt-menu" aria-hidden="true" style="color:white"></i></a>
                        </div>
                        </div>
                        </header>
                        </div>
                            @yield('content')
                            </div>
                        @include('components.cart_sidebar')

   
</body>
</html>
