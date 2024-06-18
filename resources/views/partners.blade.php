@include('layouts.header', ['slider' => true])
<div class="mt-5 container d-flex flex-wrap">
    @for ($i = 0; $i < 50; $i++)
        <div class="partners-logo p-3">
            <img src="{{ asset('/images/dondi.png') }}" alt="">
        </div>
        <div class="partners-logo px-3">
            <img src="{{ asset('/images/640px-La-furniture-store-logo-large.jpg') }}" alt="">
        </div>
        <div class="partners-logo px-3">
        </div>
    @endfor
</div>
@include('layouts.footer')
