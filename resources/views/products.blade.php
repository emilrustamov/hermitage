@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

<div style="padding: 25px 80px; background-color: #BCBDB8;">
    <p class="col-lg-11 mx-auto text">{{ __('translation.products_title') }}</p>
    <br>
    <p class="col-lg-11 mx-auto text">{{ __('translation.products_p1') }}</p>

    <div class="container mt-5">
        <form method="GET" action="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="row">
            <div class="col-md-2">
                <select name="category_id" class="custom-select">
                    <option value="all">{{ __('translation.products_option1') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="brand_id" class="custom-select">
                    <option value="all">{{ __('translation.products_option2') }}</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_by" class="custom-select">
                    <option value="created_at">{{ __('translation.products_sort1') }}</option>
                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>
                        {{ __('translation.products_sort2') }}</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>
                        {{ __('translation.products_price_up') }}</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>
                        {{ __('translation.products_price_down') }}</option>
                    <option value="newest_asc" {{ request('sort_by') == 'newest_asc' ? 'selected' : '' }}>
                        {{ __('translation.products_new_up') }}</option>
                    <option value="newest_desc" {{ request('sort_by') == 'newest_desc' ? 'selected' : '' }}>
                        {{ __('translation.products_new_down') }}</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">{{ __('translation.products_apply') }}</button>
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-secondary">{{ __('translation.products_reset') }}</a>
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
                    <div class="content-appearance  p-0 product-card" id="content-price"
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
                        </div>
                        <div class="hover-content">
                            <div class="d-flex justify-content-between">
                                <p class="product-text">{{ $product->title_ru }}</p>
                                <p class="product-price">{{ $product->price }} {{ __('translation.products_tmt') }}
                                </p>
                            </div>
                            <button class="add-to-cart" data-id="{{ $product->id }}"
                                data-title="{{ $product->title_ru }}" data-price="{{ $product->price }}"
                                data-image="{{ asset($product->image) }}">{{ __('translation.products_trash') }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $products->links() }}
    </div>
</div>
<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Уведомление</strong>
        </div>
        <div class="toast-body">
            Товар добавлен в корзину
        </div>
    </div>
</div>
<div id="toast-favorite-container" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToastFavorite" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
        style="display: none;">
        <div class="toast-header">
            <strong class="me-auto">Уведомление</strong>
        </div>
        <div class="toast-body">
            <!-- Сообщение будет обновлено в JavaScript -->
        </div>
    </div>
</div>

@include('layouts.footer')


<script>
    console.log(typeof $); // Должно вывести "function"

    function showFavoriteToast(message) {
    let toastEl = $('#liveToastFavorite'); // Убедитесь, что используете jQuery для обертки

    // Изменить сообщение Toast
    toastEl.find('.toast-body').text(message);

    // Показать Toast с использованием jQuery fadeIn
    toastEl.fadeIn(500, function() {
        setTimeout(function() {
            // Скрыть Toast с использованием jQuery fadeOut
            toastEl.fadeOut(500);
        }, 2000); // Длительность показа Toast перед скрытием
    });
}

    document.addEventListener('DOMContentLoaded', () => {
        const originalOrder = [];
        const nav = document.querySelector('#nav');
        const locale = '{{ app()->getLocale() }}';

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


    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.dataset.id;
            let button = this;

            let url = `/${locale}/favorite/` + (button.querySelector('i').classList.contains(
                'fa-regular') ? 'add' : 'remove');

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product added to favorites') {
                        button.querySelector('i').classList.add('fa-solid');
                        button.querySelector('i').classList.remove('fa-regular');
                        showFavoriteToast('Товар добавлен в избранное');
                    } else if (data.message === 'Product removed from favorites') {
                        button.querySelector('i').classList.add('fa-regular');
                        button.querySelector('i').classList.remove('fa-solid');
                        showFavoriteToast('Товар удален из избранного');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });



</script>


<script>
  $(function() {
    $('form').on('change', 'select', function() {
        let form = $(this).closest('form');
        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            success: function(response) {
                $('.products-grid').html(response.html);
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Просмотр ошибок, если что-то пошло не так
            }
        });
    });
});

</script>
