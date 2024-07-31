@php
    $banners = App\Models\Banner::where('page_identifier', 'about')->get();
@endphp

@include('layouts.header', [
    'slider' => $banners->count() > 1,
    'banner' => $banners->count() == 1 ? $banners->first()->banner : null,
    'banners' => $banners,
    'show_single_slide' => $banners->count() <= 1,
])
<section class="fav-sect">
    <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
            <div class="d-flex flex-column">
                <h1 class="mb-5 text-white align-self-center">{{ __("translation.favorite_h1") }}</h1>
                <div class="mt-5 text-white fs-3 text-center align-self-center">{{ __("translation.favorite_title")}}</div>
            </div>
            <div></div>
        </div>
        <div class="col-lg-8 p-0">
            <div class="slider-wrapper">
                <div class="fav-slider d-flex align-items-center">
                    @foreach ($favorites as $favorite)
                        <div class="product-item d-flex justify-content-center align-items-center">
                            <div class="img-wrapper">
                                <img src="{{ asset($favorite->image) }}" alt="Product Image" class="product-img">
                            </div>
                            <div class="product-info d-flex flex-column ml-3">
                                <div class="d-flex name-w-delete align-items-center justify-content-between">
                                    <p class="fs-4 my-auto">{{ $favorite->title_ru }}</p>
                                    <button class="remove-favorite" data-id="{{ $favorite->id }}">
                                        <img src="{{ asset('/images/icons/bin.png') }}" alt="Удалить из избранного">
                                    </button>
                                </div>
                                <p class="fs-5 product-price text-center mt-2">{{ $favorite->price }} {{ __('translation.price_p')}}</p>
                                <div class="d-flex align-items-center shipment">
                                    <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
                                    <p class="my-auto text-center">{{ __("translation.favorite_p") }}</p>
                                </div>
                                <button class="mx-auto buy-btn add-to-cart" data-id="{{ $favorite->id }}" data-title="{{ $favorite->title_ru }}" data-price="{{ $favorite->price }}" data-image="{{ asset($favorite->image) }}">Добавить в корзину</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
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
    document.addEventListener('DOMContentLoaded', function() {
        var locale = '{{ app()->getLocale() }}';

        document.querySelectorAll('.remove-favorite').forEach(button => {
            button.addEventListener('click', function() {
                let favoriteId = this.dataset.id;

                fetch(`/${locale}/favorite/remove`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ product_id: favoriteId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product removed from favorites') {
                        showFavoriteToast('Товар удалён из избранного');
                        this.closest('.product-item').remove();
                    } else {
                        showFavoriteToast('Ошибка при удалении из избранного');
                    }
                })
                .catch(error => console.error('Ошибка:', error));
            });
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