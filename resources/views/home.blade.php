@include('layouts.header', ['slider' => true])

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
            <button class="see-more-btn">Узнать больше</button>
        </div>
    </div>
</section>
<section class="scroll-fade-in">
    <p class="text-center our-areas">Наши направления</p>
    <div class="container">
        <div class="row areas-block">
            @foreach ($categories as $category)
                <div class="col-lg-3">
                    <div class="area-wrap">
                        <a href="{{ route('category.show', ['id' => $category->id, 'locale' => app()->getLocale()]) }}">
                            <img src="{{ asset($category->main_image) }}" alt="">
                            <p class="area-title">{{ $category->title_ru }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="scroll-fade-in">
    <a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}">
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
    </a>
</section>
<section class="scroll-fade-in">
    <a href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}">
        <div class="contacts-block">
            <img src="{{ asset('/images/yyldyz.jpg') }}" alt="">
            <div class="contracts-text d-flex flex-column justify-content-end text-center">
                <p class="text-uppercase contr-proj">Контракты</p>
            </div>
        </div>
    </a>
</section>

@include('layouts.footer')
