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

                        <div style="display: flex">
                            <nav role="navigation">
                                <div id="menuToggle">
                                    <input type="checkbox" />
                                    <span style="background-color: #000 !important"></span>
                                    <span style="background-color: #000 !important"></span>
                                    <span style="background-color: #000 !important"></span>
                                    <ul id="menu">
                                        <a class="nav-link <?php if (request()->is('admin/vacancies*')) { echo 'active'; } ?>" href="{{ route('admin.vacancies.index') }}">
                                            <li>Вакансии</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/blogs*')) { echo 'active'; } ?>" href="{{ route('admin.blogs.index') }}">
                                            <li>Блог</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/projects*')) { echo 'active'; } ?>" href="{{ route('admin.projects.index') }}">
                                            <li>Проекты</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/partners*')) { echo 'active'; } ?>" href="{{ route('admin.partners.index') }}">
                                            <li>Партнёры</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/users*')) { echo 'active'; } ?>" href="{{ route('admin.users.index') }}">
                                            <li>Пользователи</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/products*')) { echo 'active'; } ?>" href="{{ route('admin.products.index') }}">
                                            <li>Товары</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/orders*')) { echo 'active'; } ?>" href="{{ route('admin.orders.index') }}">
                                            <li>Заказы</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/models*')) { echo 'active'; } ?>" href="{{ route('admin.models.index') }}">
                                            <li>Модели</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/certificates*')) { echo 'active'; } ?>" href="{{ route('admin.certificates.index') }}">
                                            <li>Сертификаты</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/banners*')) { echo 'active'; } ?>" href="{{ route('admin.banners.index') }}">
                                            <li>Баннеры</li>
                                        </a>
                                        <a class="nav-link <?php if (request()->is('admin/contracts*')) { echo 'active'; } ?>" href="{{ route('admin.contracts.index') }}">
                                            <li>Контракты</li>
                                        </a>
                                        
    
                                    </ul>
                                </div>
                            </nav>
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><img
                                    src="{{ asset('/images/logo.svg') }}" alt="logo" class="logo admin-logo"
                                    @if ($hasimage) style="filter:invert(1)" @endif></a>
                        </div>
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
