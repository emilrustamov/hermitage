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
                                    src="{{ asset('/images/logo.svg') }}" alt="logo" class="logo"
                                    @if ($hasimage) style="filter:invert(1)" @endif ></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">

                        <div @if (!$hasimage) class="d-flex with-black-links" @else class="d-flex" @endif>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/vacancies*')) echo 'active'; ?>" href="{{ route('admin.vacancies.index') }}">Вакансии</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/blogs*')) echo 'active'; ?>" href="{{ route('admin.blogs.index') }}">Блог</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/projects*')) echo 'active'; ?>" href="{{ route('admin.projects.index') }}">Проекты</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/partners*')) echo 'active'; ?>" href="{{ route('admin.projects.index') }}">Партнёры</a>
                            </div>
                            <div class="px-2">
                                <a class="nav-link <?php if (request()->is('admin/directions*')) echo 'active'; ?>" href="{{ route('admin.projects.index') }}">Направления</a>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="languageDropdown"
                                   @if ($hasimage)
                                       style="color: white"
                                       @else
                                       style="color: black"
                                       
                                   @endif >
                                    {{ strtoupper(app()->getLocale()) }}
                                </button>
                                <div class="dropdown-menu" id="dropdownMenu">
                                    <a class="dropdown-item" href="#" data-lang="ru">RU</a>
                                    <a class="dropdown-item" href="#" data-lang="en">EN</a>
                                    <a class="dropdown-item" href="#" data-lang="tk">TK</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
        </div>
        @yield('content')
    </div>



</body>

</html>
