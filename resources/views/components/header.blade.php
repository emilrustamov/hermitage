<header
    style="background-image: url({{ $image }}); min-height: 900px; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-6 col-6 d-flex">
                <nav role="navigation" style="display: inline-flex">
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
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                        <img src="{{ asset('/images/logo.svg') }}" alt="logo" class="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-6 text-end">
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
                <i class="fa fa-user" aria-hidden="true" style="color:white"></i>
                <i class="fa fa-shopping-cart" aria-hidden="true" style="color:white"></i>
                <i class="fa fa-heart" aria-hidden="true" style="color:white"></i>
            </div>
        </div>
    </div>
</header>
