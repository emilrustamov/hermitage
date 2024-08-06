<div class="products-grid row">
    @foreach ($products as $product)
        <div class="content-appearance  p-0 product-card" id="content-price" data-sort="{{ $product->price }}">
            <div class="product-image-container"
                style="background-image: url('{{ $product->image }}'); background-size: cover">
                @if ($product->is_new)
                    <span class="badge badge-secondary new-badge-abs">New</span>
                @endif
                @auth
                    <button class="favorite-btn" data-id="{{ $product->id }}">
                        <i
                            class="fa-heart {{ Auth::user()->favorites->contains($product->id) ? 'fa-solid' : 'fa-regular' }}"></i>
                    </button>
                @endauth
            </div>
            <div class="hover-content">
                <div class="d-flex justify-content-between">
                    <p class="product-text">{{ $product->$titleField }}</p>
                    <p class="product-price">{{ $product->price }} {{ __('translation.products_tmt') }}
                    </p>
                </div>
                <button class="add-to-cart" data-id="{{ $product->id }}" data-title="{{ $product->$titleField }}"
                    data-price="{{ $product->price }}"
                    data-image="{{ asset($product->image) }}">{{ __('translation.products_trash') }}</button>
            </div>
        </div>
    @endforeach
</div>
