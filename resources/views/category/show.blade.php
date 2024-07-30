@include('layouts.header', ['slider' => true])

<div class="container mt-5">
    <h1>{{ $category->{'title_' . app()->getLocale()} }}</h1>
    <p>{{ strip_tags($category->{'description_' . app()->getLocale()}) }}</p>

    <h2>{{ __('translation.category_items') }}</h2>
    <div class="row">
        @foreach ($category->items as $item)
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <a href="{{ asset($item->poster_img) }}" data-fancybox="gallery-{{ $item->id }}" data-caption="{{ $item->{'description_' . app()->getLocale()} }}">
                        <img src="{{ asset($item->poster_img) }}" class="card-img-top" alt="{{ $item->{'description_' . app()->getLocale()} }}">
                    </a>
                    @if (!empty($item->images))
                        @foreach (json_decode($item->images, true) as $image)
                            <a href="{{ asset($image) }}" data-fancybox="gallery-{{ $item->id }}" data-caption="{{ $item->{'description_' . app()->getLocale()} }}"></a>
                        @endforeach
                    @endif
                    @if (!empty($item->videos))
                        @foreach (json_decode($item->videos, true) as $video)
                            <a href="{{ asset($video) }}" data-fancybox="gallery-{{ $item->id }}" data-caption="{{ $item->{'description_' . app()->getLocale()} }}" data-type="iframe"></a>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ strip_tags($item->{'description_' . app()->getLocale()}) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> --}}
<script>
    jQuery(function() {
        jQuery('[data-fancybox]').fancybox({
            protect: true
        });
    });
</script>