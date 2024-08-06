@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp
@php
    $locale = app()->getLocale(); // Получаем текущий язык
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

<div style="padding: 25px 44px; background-color: #BCBDB8;">
    <p class="col-lg-11  text" style="margin-left: 5px">{{ __('translation.products_title') }}</p>
    <br>
    <p class="col-lg-11  text" style="margin-left: 5px">{{ __('translation.products_p1') }}</p>

    <div class="mt-5">
        <form method="GET" action="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="row">
            <div class="col-md-2" style="padding-left: 0 !important">
                <select name="category_id" class="custom-select">
                    <option value="all">{{ __('translation.products_option1') }}</option>
                    @foreach ($categories as $category)
                        @php
                            $titleField = 'title_' . $locale; // Формируем имя поля для текущего языка
                        @endphp
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->$titleField }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="brand_id" class="custom-select">
                    <option value="all">{{ __('translation.products_option2') }}</option>
                    @foreach ($brands as $brand)
                        @php
                            $titleField = 'title_' . $locale; // Формируем имя поля для текущего языка
                        @endphp
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->$titleField }}
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
                    @php
                        $titleField = 'title_' . $locale; // Формируем имя поля для текущего языка
                    @endphp
                    <div class="content-appearance p-0 product-card" id="content-price"
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
                                <p class="product-text">{{ $product->$titleField }}</p>
                                <p class="product-price">{{ $product->price }} {{ __('translation.products_tmt') }}
                                </p>
                            </div>
                            <button class="add-to-cart" data-id="{{ $product->id }}"
                                data-title="{{ $product->$titleField }}" data-price="{{ $product->price }}"
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
                    attachEventHandlers(); // Повторно назначаем события после фильтрации
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        function attachEventHandlers() {
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.dataset.id;
                    let button = this;
                    let locale = '{{ app()->getLocale() }}';

                    let url = `/${locale}/favorite/` + (button.querySelector('i').classList
                        .contains('fa-regular') ? 'add' : 'remove');

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

        }

        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.querySelector('.cart-items');
            cartItems.innerHTML = ''; // Очистить существующие элементы
            let total = 0;
            let itemCount = 0; // Для подсчета количества товаров

            cart.forEach(item => {
                const itemHtml = `
            <div class="product-item" data-id="${item.id}">
                <div class="product">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <button class="remove-item btn my-auto" data-id="${item.id}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                            <img src="${item.image}" alt="Product Image" width="40px" height="40px" class="align-self-center cart-prod-img"/>
                            <div>
                                <p class="product-cart-title">${item.title}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <p class="product-price-info">Цена за единицу товара:</p>
                                        <div class="quantity-control">
                                            <button class="decrease-quantity my-auto" data-id="${item.id}">-</button>
                                            <p class="quant my-auto">${item.quantity}</p>
                                            <button class="increase-quantity my-auto" data-id="${item.id}">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="product-price">${item.price} TMT</p>
                    </div>
                </div>
            </div>`;
                cartItems.insertAdjacentHTML('beforeend', itemHtml);
                total += item.price * item.quantity;
                itemCount += item.quantity; // Увеличиваем количество товаров
            });

            document.querySelector('.total-price').textContent = `${total.toFixed(2)} TMT`;

            // Обновляем бейдж с количеством товаров
            document.getElementById('cartBadge').textContent = itemCount;
            // Скрываем бейдж, если в корзине нет товаров
            document.getElementById('cartBadge').style.display = itemCount > 0 ? 'block' : 'none';
        }

        attachEventHandlers();
        loadCart(); // Инициализация корзины при загрузке страницы
    });
</script>
