@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

<div class="container mt-5">
    <h1>{{ __('translation.search_results_for') }} "{{ $query }}"</h1>
    <div class="products-grid row">
        @foreach ($products as $product)
            <div class="content-appearance col-lg-3 p-0 product-card" id="content-price" data-sort="{{ $product->price }}">
                <div class="product-image-container" style="background-image: url('{{ $product->image }}'); background-size: cover">
                    @if ($product->is_new)
                        <span class="badge badge-secondary new-badge-abs">New</span>
                    @endif
                    @auth
                        <button class="favorite-btn" data-id="{{ $product->id }}">
                            <i class="fa-heart {{ Auth::user()->favorites->contains($product->id) ? 'fa-solid' : 'fa-regular' }}"></i>
                        </button>
                    @endauth
                </div>
                <div class="hover-content">
                    <div class="d-flex justify-content-between">
                        <p class="product-text">{{ $product->title }}</p>
                        <p class="product-price">{{ $product->price }} {{ __('translation.products_tmt') }}</p>
                    </div>
                    <button class="add-to-cart" data-id="{{ $product->id }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-image="{{ asset($product->image) }}">{{ __('translation.products_trash') }}</button>
                </div>
            </div>
        @endforeach
    </div>

    {{ $products->links() }}
</div>

@include('layouts.footer')
