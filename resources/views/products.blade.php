@include('layouts.header', ['slider' => true])

<div style="padding: 25px 80px; background-color: #BCBDB8;">
    <!-- Описание и фильтры -->
</div>

<div class="purchases" style="background-color: #E9E9E9;">
    <div class="container" style="padding-top: 35px;">
        <div class="row gy-1" id="nav">
            <!-- Display Products -->
            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="content-appearance col-lg-3 p-0" id="content-price" data-sort="{{ $product->price }}">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset($product->image ?? '/images/product1.jpg') }}" alt="Product Image"
                                class="product-img">
                            <div class="product-desc">
                                <p class="product-text">{{ $product->title_ru }}</p>
                                <p class="product-price">{{ $product->price }} TMT</p>
                                <button class="add-to-cart" data-id="{{ $product->id }}"
                                    data-title="{{ $product->title_ru }}" data-price="{{ $product->price }}">Добавить в
                                    корзину</button>
                            </div>
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
