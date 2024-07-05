@php
    $banner = App\Models\Banner::where('page_identifier', 'vacancies')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
{{-- @include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null]) --}}

<div class="mt-5 px-5">
    {{-- <h1>Vacancies1</h1> --}}
    <div class="row justify-content-between ">
        @foreach ($vacancies as $vacancy)
            <div class=" vacanc-img mb-5">
            {{-- <div class="col-md-6 col-lg-6 col-12 vacanc-img"> --}}
                <div class="mb-4 ">

                    <a href="{{ route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}"><img src="{{ asset($vacancy->image) }}" class="card-img-top black-photo" alt="{{ $vacancy->title }}"></a>

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
