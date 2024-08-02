@php
    $banners = App\Models\Banner::where('page_identifier', 'vacancies')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

<div class="mt-5 px-5">
    {{-- <h1>Vacancies1</h1> --}}
    <div class="row justify-content-between ">
        @foreach ($vacancies as $vacancy)
            <div class=" vacanc-img mb-5">
                <div class="mb-4 ">
                    <a href="{{ route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}">
                        <div class="vacanc-img-wrapper">
                            <img src="{{ asset($vacancy->image) }}" class="card-img-top black-photo"
                                alt="{{ $vacancy->title }}">
                            </div>
                    </a>
                    <div class="card-body" style="margin-top:15px">
                        <a class="" style="color: black; text-decoration:none"
                            href="{{ route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}">
                            <h5 class="card-title card-title-link">{{ $vacancy->title }}</h5>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $vacancies->links() }}
    </div>
</div>

@include('layouts.footer')
