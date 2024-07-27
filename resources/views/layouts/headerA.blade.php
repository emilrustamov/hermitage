<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}



    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])



</head>

<body>
    <div class="wrapper p-0">
        <div>
            <header>

                <div class="header-content ">
                    <div class="d-flex">

                        <div style="display: inline-flex">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img
                                    src="{{ asset('/images/logo.svg') }}" alt="logo" class="logo admin-logo"
                                    @if ($hasimage) style="filter:invert(1)" @endif></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">

                        <div
                            @if (!$hasimage) class="d-flex with-black-links" @else class="d-flex" @endif>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/vacancies*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.vacancies.index') }}">Вакансии</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/blogs*')) {
                                    echo 'active';
                                } ?>" href="{{ route('admin.blogs.index') }}">Блог</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/projects*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.projects.index') }}">Проекты</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/partners*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.partners.index') }}">Партнёры</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/users*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.users.index') }}">Пользователи</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/products*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.products.index') }}">Товары</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/orders*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.orders.index') }}">Заказы</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/models*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.models.index') }}">Модели</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/certificates*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.certificates.index') }}">Сертификаты</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/banners*')) {
                                    echo 'active';
                                } ?>"
                                    href="{{ route('admin.banners.index') }}">Баннеры</a>
                            </div>
                            <div class="px-2">
                                <a href="{{ route('logout', ['locale' => app()->getLocale()]) }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выход</i>
                                </a>
                                <form id="logout-form" action="{{ route('logout', ['locale' => app()->getLocale()]) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="text-end">
                            {{-- <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="languageDropdown"
                                    @if ($hasimage) style="color: white"
                                       @else
                                       style="color: black" @endif>
                                    {{ strtoupper(app()->getLocale()) }}
                                </button>
                                <div class="dropdown-menu" id="dropdownMenu">
                                    <a class="dropdown-item" href="#" data-lang="ru">RU</a>
                                    <a class="dropdown-item" href="#" data-lang="en">EN</a>
                                    <a class="dropdown-item" href="#" data-lang="tk">TK</a>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </header>
        </div>
        @yield('content')
    </div>
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



</body>

</html>
