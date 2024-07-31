<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" /> --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    #menu {
        height: 100vh !important;
        width: 370px !important;
    }

    ::-webkit-scrollbar {
        background-color: white !important;
    }
</style>

<body>
    <div class="wrapper p-0">
        <div>
            <header>
                @if ($slider)
                    @if (isset($banner))
                        <div class="single-slide slider-item"
                            style="background-image: url('{{ asset('storage/' . $banner) }}');">
                        </div>
                    @else
                        @include('layouts.head_slider')
                    @endif
                @else
                    @if ($show_single_slide ?? true)
                        @if (isset($banner))
                            <div class="single-slide slider-item"
                                style="background-image: url('{{ asset('storage/' . $banner) }}'); ">
                            </div>
                        @else
                            <div class="single-slide slider-item" style="background-image: url('{{ asset($image) }}');">
                            </div>
                        @endif
                    @endif
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
                                    <a class="nav-link" href="{{ route('about', ['locale' => app()->getLocale()]) }}">
                                        <li>О нас</li>
                                    </a>
                                    <a class="nav-link" href="{{ route('areas', ['locale' => app()->getLocale()]) }}">
                                        <li>Наши направления</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('partners.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Партнеры</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Контракты</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Проекты</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('products.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Товары в наличии</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('productsnew.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Новые поступления</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Новости</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('vacancies.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Вакансии</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('requests.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Заказать проект</li>
                                    </a>
                                    <a class="nav-link"
                                        href="{{ route('certificates.index', ['locale' => app()->getLocale()]) }}">
                                        <li>Сертификаты</li>
                                    </a>


                                </ul>
                            </div>
                        </nav>
                        <div style="display: inline-flex">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img
                                    src="{{ asset('/images/logo.svg') }}" style="filter:invert(1)" alt="logo"
                                    class="logo"></a>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="languageDropdown"
                                style="{{ request()->routeIs(['register', 'login', 'password.request']) ? 'color: black;' : 'color: white;' }}">
                                {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a class="dropdown-item" href="#" data-lang="ru">RU</a>
                                <a class="dropdown-item" href="#" data-lang="en">EN</a>
                                <a class="dropdown-item" href="#" data-lang="tk">TK</a>
                            </div>
                        </div>
                        @auth
                            <a href="{{ route('logout', ['locale' => app()->getLocale()]) }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="logout-a">
                                <i class="fa fa-sign-out punkt-menu {{ request()->routeIs(['register', 'login', 'password.request']) ? 'black-imp' : 'white-imp' }}"
                                    aria-hidden="true"></i>
                            </a>
                            <script>
                                document.querySelector('a[href="{{ route('logout', ['locale' => app()->getLocale()]) }}"]').addEventListener(
                                    'click',
                                    function(event) {
                                        event.preventDefault();
                                        if (confirm('Are you sure you want to log out?')) {
                                            document.getElementById('logout-form').submit();
                                        }
                                    });
                            </script>
                            <form id="logout-form" action="{{ route('logout', ['locale' => app()->getLocale()]) }}"
                                method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" style="color: transparent">
                                <i class="fa fa-user punkt-menu {{ request()->routeIs(['register', 'login', 'password.request']) ? 'black-imp' : 'white-imp' }}"
                                    aria-hidden="true"></i>
                            </a>
                        @endauth
                        <i class="fa fa-shopping-cart punkt-menu"
                            style="{{ request()->routeIs(['register', 'login', 'password.request']) ? 'color: black;' : 'color: white;' }}"
                            aria-hidden="true" id="cartIcon"></i>


                        @auth
                            <a href="{{ route('favorite.show', ['locale' => app()->getLocale()]) }}"><i
                                    class="fa fa-heart punkt-menu {{ request()->routeIs(['register', 'login', 'password.request']) ? 'black-imp' : 'white-imp' }}"
                                    aria-hidden="true" style="color:white"></i></a>
                        @endauth
                    </div>
                </div>
            </header>
        </div>
        @yield('content')
    </div>
    @include('components.cart_sidebar')


</body>

</html>
