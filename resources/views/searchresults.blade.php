@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])

<div class="purchases">
    <div class="container mt-5">
        <h1>{{ __('translation.search_results_for') }} "{{ $query }}"</h1>
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
                    </div>
                    <div class="hover-content">
                        <div class="d-flex justify-content-between">
                            <p class="product-text">{{ $product->title }}</p>
                            <p class="product-price">{{ $product->price }} {{ __('translation.products_tmt') }}</p>
                        </div>
                        <button class="add-to-cart" data-id="{{ $product->id }}" data-title="{{ $product->title }}"
                            data-price="{{ $product->price }}"
                            data-image="{{ asset($product->image) }}">{{ __('translation.products_trash') }}</button>
                    </div>
                </div>
            @endforeach
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
    // $(document).ready(function() {
    //     $(".content-appearance").slice(0, 12).show();
    //     $("#loadMore").on("click", function(e) {
    //         e.preventDefault();
    //         $(".content-appearance:hidden").slice(0, 4).slideDown();
    //         if ($(".content-appearance:hidden").length == 0) {
    //             $("#loadMore").text("Нет элементов").addClass("noContent");
    //         }
    //     });

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


    function showFavoriteToast(message) {
        let toastEl = $('#liveToastFavorite');

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
</script>
