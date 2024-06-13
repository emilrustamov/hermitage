@include('layouts.header', ['slider' => false])
{{-- <div class="container"> --}}
    <div class="cert-slider-wrapper">
        <div class="cert-slider">
            <div class="item">
                <img src="{{ asset('/images/cert-mock.png') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock2.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock.png') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock2.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock.png') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock2.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock.png') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock2.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('/images/cert-mock.png') }}" alt="">
            </div>
        </div>
        <p class="text-center">Компания HERMITAGE HOME INTERIORS обладает большим количеством сертификатов</p>
    </div>
{{-- </div> --}}
@include('layouts.footer')