@php
    $banner = App\Models\Banner::where('page_identifier', 'partners')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
{{-- @include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null]) --}}

<div class="mt-5 px-5">
    {{-- <h1>Vacancies1</h1> --}}
    <div class="row">
        @foreach ($vacancies as $vacancy)
            <div class=" vacanc-img">
            {{-- <div class="col-md-6 col-lg-6 col-12 vacanc-img"> --}}
                <div class="mb-4 ">

                    <img src="{{ asset($vacancy->image) }}" class="card-img-top black-photo" alt="{{ $vacancy->title }}">

                    <div class="card-body" style="margin-top:15px">
                        <a style="color: black; text-decoration:none"
                            href="{{ route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}">
                            <h5 class="card-title">{{ $vacancy->title }}</h5>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $vacancies->links() }}
    </div>
</div>

@include('layouts.footer')
