@include('layouts.header', ['slider' => true])

<div style="padding: 25px 80px; background-color: #BCBDB8;">
    <p class="col-lg-11 mx-auto text">{{ __('translation.productsnew_title')}}</p>
    <br>
    <p class="col-lg-11 mx-auto text">{{ __('translation.productsnew_p1')}}</p>

    <div class="container mt-5">
        <form method="GET" action="{{ route('productsnew.index', ['locale' => app()->getLocale()]) }}" class="row">
            <div class="col-md-2">
                <select name="category_id" class="form-control">
                    <option value="all">{{ __('translation.productsnew_option1')}}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="brand_id" class="form-control">
                    <option value="all">{{ __('translation.productsnew_option2')}}</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_by" class="form-control">
                    <option value="created_at">{{ __('translation.productsnew_sort1')}}</option>
                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>{{ __('translation.productsnew_sort2')}}</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>{{ __('translation.productsnew_price_up')}}</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>{{ __('translation.productsnew_price_down')}}</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">{{ __('translation.productsnew_apply')}}</button>
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-secondary">{{ __('translation.productsnew_reset')}}</a>
            </div>
        </form>
    </div>
</div>

<div class="purchases" style="background-color: #E9E9E9;">
    <div class="container" style="padding-top: 35px;">
        <div class="row gy-1" id="nav">
            <!-- Display Products -->
            <div class="products-grid row">
                @foreach ($products as $product)
                <div class="content-appearance col-lg-3 p-0 product-card" id="content-price"
                    data-sort="{{ $product->price }}">
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
                        {{-- <img src="{{ asset($product->image) }}" alt="Product Image" class="product-img"> --}}
                    </div>
                    <div class="hover-content">
                        <div class="d-flex justify-content-between">
                            <p class="product-text">{{ $product->title_ru }}</p>
                            <p class="product-price">{{ $product->price }} TMT</p>
                        </div>
                        <button class="add-to-cart" data-id="{{ $product->id }}"
                            data-title="{{ $product->title_ru }}" data-price="{{ $product->price }}"
                            data-image="{{ asset($product->image) }}">Добавить в корзину</button>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        {{ $products->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const originalOrder = [];
        const nav = document.querySelector('#nav');

        document.querySelectorAll('#nav > div').forEach((element, index) => {
            originalOrder.push({
                element,
                index
            });
        });

        const sortAscButton = document.querySelector('#sort-asc');
        const sortDescButton = document.querySelector('#sort-desc');
        const clearButton = document.querySelector('#clearButton');

        sortAscButton?.addEventListener('click', () => sortItems(true));
        sortDescButton?.addEventListener('click', () => sortItems(false));
        clearButton?.addEventListener('click', resetOrder);

        function sortItems(asc = true) {
            const items = Array.from(nav.children);
            items.sort((a, b) => {
                const aValue = parseFloat(a.getAttribute('data-sort'));
                const bValue = parseFloat(b.getAttribute('data-sort'));
                return asc ? aValue - bValue : bValue - aValue;
            });

            items.forEach(item => nav.appendChild(item));
        }

        function resetOrder() {
            while (nav.firstChild) {
                nav.removeChild(nav.firstChild);
            }

            originalOrder.sort((a, b) => a.index - b.index);
            originalOrder.forEach(item => nav.appendChild(item.element));
        }
    });

    $(document).ready(function() {
        $(".content-appearance").slice(0, 12).show();
        $("#loadMore").on("click", function(e) {
            e.preventDefault();
            $(".content-appearance:hidden").slice(0, 4).slideDown();
            if ($(".content-appearance:hidden").length == 0) {
                $("#loadMore").text("Нет элементов").addClass("noContent");
            }
        });
    });
</script>

@include('layouts.footer')
