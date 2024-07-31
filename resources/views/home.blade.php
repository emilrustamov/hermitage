
@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

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
            <div class="mb-4 fs-5">{{ __('translation.home_title') }}</div>
            <button class="see-more-btn">{{ __('translation.home_btn')}}</button>
        </div>
    </div>
</section>
<section class="scroll-fade-in">
    <p class="text-center our-areas">{{ __('translation.home_partners') }}</p>
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
                    <p class="inspire-title">{{ __('translation.home_title_p1')}}</p>
                    <p class="inspire-sub">{{ __('translation.home_title_p2')}}</p>
                </div>
                <p class="text-uppercase insp-proj">{{ __('translation.home_title_p3')}}</p>
            </div>
        </div></a>
</section>
<section class="scroll-fade-in">
    <a href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}">
        <div class="contacts-block">
            <img src="{{ asset('/images/yyldyz.jpg') }}" alt="">
            <div class="contracts-text d-flex flex-column justify-content-end text-center">
                <p class="text-uppercase contr-proj">{{ __('translation.home_title_p4') }}</p>
            </div>
        </div>
    </a>
</section>

@include('layouts.footer')