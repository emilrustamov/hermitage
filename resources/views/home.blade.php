@include('layouts.header', ['slider' => true])
@php
    $areas = [
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 1',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 2',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 3',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 4',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 5',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 6',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 7',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 8',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 9',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 10',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 11',
        ],
        [
            'image' => '/images/kuhnya.jpg',
            'title' => 'Направление 12',
        ],
    ];
@endphp
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<section class="aboutSctn scroll-fade-in">
    <div class="row py-5">
        <div class="col-lg-8 text-center">
            <img src="{{ asset('/images/main-reception.jpg') }}" class="mx-auto img-fluid ">
        </div>
        <div class="col-lg-4 align-self-center d-flex flex-column">
            <h1>{{ __('translation.about') }}</h1>
            <div class="mb-4 fs-5">HERMITAGE HOME INTERIORS - это компания премиум класса, которая позволяет
                почувствовать символ безупречного вкуса, синтеза современных технологий с традиционным итальянским
                качеством, эксклюзивный современный дизайн и утончённый стиль , представляющий смесь различных культур и
                времён.
            </div>
            <button>Узнать больше</button>
        </div>
    </div>
</section>
<section class="scroll-fade-in">
    {{-- <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
            <h2 class=" text-white align-self-center">Направления</h2>
            <div class="fs-4 text-white align-self-center">Ознакомьтесь с нашими направлениями</div>
            <a href="#" class="text-uppercase  align-self-center" style="color: white;">посмотреть все</a>
        </div>
        <div class="col-lg-8 p-0">
            <div class="regular slider">
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/mebel.png') }}" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/svet.jpg') }}" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
            </div>
        </div>
    </div> --}}
    <p class="text-center our-areas">Наши направления</p>
    <div class="container">
        <div class="row areas-block">
            @foreach ($areas as $area)
                <div class="col-lg-3">
                    <div class="area-wrap">
                        <img src="{{ asset($area['image']) }}" alt="">
                        <p class="area-title">{{ $area['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="scroll-fade-in">
    <div class="inspire-block">
        <img src="{{ asset('/images/fullkuhnya.jpg') }}" alt="">
        <div class="inspire-text d-flex flex-column justify-content-between text-center">
            <div class="d-flex flex-column">
                <p class="inspire-title">Вдохновение</p>
                <p class="inspire-sub">Ознакомьтесь с нашими последними жилыми и коммерческими проектами</p>
            </div>
            <p class="text-uppercase insp-proj">Проекты</p>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-3 prdct p-0" style="background-color: white">
            <img src="{{ asset('/images/product1.jpg') }}" class="w-100 h-100">
            <div class="prc">
                <div>skygarden 1 suspersion lamp</div>
                <div class="text-end">50 000, 00 TMT</div>
            </div>
        </div>
        <div class="col-lg-3 prdct p-0" style="background-color: white">
            <img src="{{ asset('/images/product2.jpg') }}" class="w-100 h-100">
            <div class="prc">
                <div>skygarden 1 suspersion lamp</div>
                <div class="text-end">50 000, 00 TMT</div>
            </div>
        </div>
        <div class="col-lg-6 position-relative p-0">
            <img src="{{ asset('/images/zal1.jpg') }}" class="w-100 h-100 less-brightness">
            <h2 class="text-white textImageL2">Покупки в один клик</h3>
                <h3 class="text-white textImageL">Покупайте у нас в наличии мебель, освещение, сантехнику и аксессуары.
                </h3>
        </div>
    </div> --}}
</section>
<section class="scroll-fade-in">
    {{-- <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
            <h2 class=" text-white align-self-center">Вдохновение</h2>
            <div class="fs-4 text-white px-2 text-center align-self-center">Ознакомьтесь с нашими последними жилыми и
                коммерческими проектами</div>
            <a href="#" class="text-uppercase  align-self-center" style="color: white; ">посмотреть все</a>
        </div>
        <div class="col-lg-8 p-0">
            <div class="regular slider">
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/kuhnya.jpg') }}" class="img-fluid mx-auto w-100 h-100 less-brightness"
                        alt="">
                    <h3 class="text-white textImageC">Проекты</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/zazhig.jpg') }}" class="img-fluid mx-auto w-100 less-brightness"
                        alt="">
                    <h3 class="text-white textImageC">Контракты</h3>
                </div>

                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100 less-brightness" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100 less-brightness" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="contacts-block">
        <img src="{{ asset('/images/yyldyz.jpg') }}" alt="">
        <div class="contracts-text d-flex flex-column justify-content-end text-center">
            <p class="text-uppercase contr-proj">Контракты</p>
        </div>
    </div>
</section>
{{-- <section>
    <div class="row">
        <div class="col-lg-6 position-relative p-0">
            <img src="{{ asset('/images/home0.jpg') }}" class="w-100 h-100 less-brightness">
            <h2 class="text-white textImageL2">Новости</h3>
                <h3 class="text-white textImageL">Будьте в курсе всех наших событий</h3>
        </div>
        <div class="col-lg-3 position-relative  p-0" style="background-color: white">
            <img src="{{ asset('/images/home1.jpg') }}" class="w-100 h-100">
            <h3 class="text-white textImageC2 text-center">Неделя дизайна в Милане: Salone del Mobile. Милан 2024</h3>
        </div>
        <div class="col-lg-3 position-relative  p-0" style="background-color: white">
            <img src="{{ asset('/images/home2.jpg') }}" class="w-100 h-100">
            <h3 class="text-white textImageC2 text-center">Открытие третьего шоурума на 10-летие компании</h3>
        </div>
    </div>
</section> --}}


@include('layouts.footer')
