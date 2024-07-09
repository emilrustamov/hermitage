@include('layouts.header', ['slider' => true])

<style>
    .container p {
        font-weight: 600;
        margin: 0;
    }
    /* bootstrap */
    .content-appearance {
        display: none;
    }
    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 350px);
        width: fit-content;
        margin: auto;
    }
    .col-lg-3 {
        position: relative;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }
    .right-align {
        margin-left: auto;
        margin-right: 0;
    }
    .container .row .col-lg-3 {
        display: none;
    }
    .clear-btn {
        background-color: transparent;
        border: none;
        float: right;
    }
    #loadMore {
        width: 200px;
        color: #fff;
        display: block;
        text-align: center;
        margin: 20px auto 40px;
        padding: 10px;
        text-decoration: none;
        background-color: black;
        transition: .3s;
    }
    .col-lg-3:hover {
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.427);
        transform: scale(1.05);
        padding: 20px 0;
        z-index: 2;
    }
    .btn {
        background-color: transparent;
        border: none;
        color: black;
        box-shadow: none;
    }
    .btn:hover, .btn:focus {
        background-color: transparent;
        border: none;
        color: black;
        box-shadow: none;
    }
    .col-sm-1 {
        width: 15%;
    }
    .title-section {
        background-color: #BCBDB8;
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(4, 25%);
        row-gap: 30px;
    }
    .product-card {
        position: relative;
        background-color: #d8dacf;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .product-card:hover {
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.427);
        transform: scale(1.05);
        z-index: 2;
    }
    .product-img {
        width: 85%;
        height: 300px;
        object-fit: cover;
        margin-bottom: 30px;
    }
    .product-desc {
        background-color: white;
        padding: 10px;
        opacity: 0;
        transition: all 0.3s ease;
    }
    .product-text {
        font-size: 16px;
        width: 90%;
        text-overflow: ellipsis;
        line-clamp: 1;
        -webkit-line-clamp: 1;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 0;
    }
    .product-price {
        font-size: 14px;
        text-align: right;
        color: red;
        margin-bottom: 0;
    }
    .product-favorite {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 20px;
        object-fit: contain;
    }
    div.gallery:hover {
        border: 1px solid #777;
    }
    div.gallery img {
        width: 100%;
        height: auto;
        background-color: #f1f1f1;
    }
    .desc {
        padding: 15px 0;
        text-align: center;
        background-color: #dedede;
        width: 80%;
    }
    .desc p {
        float: right;
        margin: 0;
    }
    * {
        box-sizing: border-box;
    }
    @media only screen and (max-width: 700px) {
        .responsive {
            width: 49.99999%;
            margin: 6px 0;
        }
    }
    @media only screen and (max-width: 500px) {
        .responsive {
            width: 100%;
        }
    }
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<div style="padding: 25px 80px; background-color: #BCBDB8;">
    <p class="col-lg-11 mx-auto text">Ознакомьтесь с нашим ассортиментом дизайнерской мебели, освещения, декора и сантехники, которые есть в наличии и готовы к быстрой доставке...</p>
    <br>
    <p class="col-lg-11 mx-auto text">Не уверены, какой предмет подойдет для вашего дома или проекта? Наша команда профессионалов в области дизайна интерьера всегда готова помочь вам найти идеальный предмет...</p>

    <div class="container mt-5">
        <form method="GET" action="{{ route('products.index') }}" class="row">
            <div class="col-md-2">
                <select name="category_id" class="form-control">
                    <option value="all">Все категории</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="brand_id" class="form-control">
                    <option value="all">Все бренды</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_by" class="form-control">
                    <option value="created_at">По умолчанию</option>
                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Название</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Цена по возрастанию</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Цена по убыванию</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Применить</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Сбросить</a>
            </div>
        </form>
    </div>
</div>

<div class="purchases" style="background-color: #E9E9E9;">
    <div class="container" style="padding-top: 35px;">
        <div class="row gy-1" id="nav">
            <!-- Display Products -->
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="content-appearance col-lg-3 p-0" id="content-price" data-sort="{{ $product->price }}">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset($product->image ?? '/images/product1.jpg') }}" alt="Product Image" class="product-img">
                            <div class="product-desc">
                                <p class="product-text">{{ $product->title_ru }}</p>
                                <p class="product-price">{{ $product->price }} TMT</p>
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
            originalOrder.push({ element, index });
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
