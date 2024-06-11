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
                {{-- <div class="regular2">
                    <div class="slide" style="background-image: url(/images/main.jpg); min-height:900px;background-repeat: no-repeat;background-size: cover;">
                        <!-- Add content for slide 1 if needed -->
                    </div>
                    <div class="slide" style="background-image: url(/images/main1.jpg); min-height:900px;background-repeat: no-repeat;background-size: cover;">
                        <!-- Add content for slide 2 if needed -->
                    </div>
                    <div class="slide" style="background-image: url(/images/main3.jpg); min-height:900px;background-repeat: no-repeat;background-size: cover;">
                        <!-- Add content for slide 3 if needed -->
                    </div>
                    <div class="slide" style="background-image: url(/images/main4.jpg); min-height:900px;background-repeat: no-repeat;background-size: cover;">
                        <!-- Add content for slide 3 if needed -->
                    </div>
                    <div class="slide" style="background-image: url(/images/main5.jpg); min-height:900px;background-repeat: no-repeat;background-size: cover;">
                        <!-- Add content for slide 3 if needed -->
                    </div>
                </div> --}}
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
                                    <a class="nav-link" href="{{ route('about', ['locale' => app()->getLocale()]) }}">
                                        <li>О нас</li>
                                    </a>
                                </ul>
                            </div>
                        </nav>
                        <div style="display: inline-flex">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img src="{{ asset('/images/logo.svg') }}" alt="logo" class="logo"></a>
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
                        <a href="{{ route('login') }}"><i class="fa fa-user punkt-menu" aria-hidden="true" style="color:white"></i></a>
                        <i class="fa fa-shopping-cart punkt-menu" aria-hidden="true" style="color:white"></i>
                        <a href="/favorites"><i class="fa fa-heart punkt-menu" aria-hidden="true" style="color:white"></i></a>
                    </div>
                </div>
            </header>
        </div>
        {{-- <main class=""> --}}
            @yield('content')
        {{-- </main> --}}
    </div>

   
</body>
</html>
