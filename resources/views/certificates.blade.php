@php
    $banner = App\Models\Banner::where('page_identifier', 'about')->first();
    $certificates = App\Models\Certificate::orderBy('ordering')->get();
@endphp

@include('layouts.header', [
    'slider' => false,
    'banner' => $banner ? $banner->banner : null,
    'show_single_slide' => false,
])
<div class="cert-slider-wrapper">
    <div class="cert-slider">
        @foreach ($certificates as $certificate)
            <div class="item">
                <img src="{{ asset('storage/' . $certificate->image) }}" alt="Certificate Image">
            </div>
        @endforeach
    </div>
    <p class="text-center">{{ __("translation.certificate") }}</p>
</div>
@include('layouts.footer')
