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
    .products-grid{
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

    /* #loadMore:hover {
    color: blue;
    background-color: #fff;
    border: 1px solid blue;
    text-decoration: none;
  } */

    .col-lg-3:hover {
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.427);
        transform: scale(1.05);
        padding: 20px 0;
        z-index: 2;
    }

    .col-lg-3:hover .product-desc {
        opacity: 1;
    }

    .btn {
        background-color: transparent;
        border: none;
        color: black;
        box-shadow: none;

    }

    .btn:hover {
        background-color: transparent;
        border: none;
        color: black;
        box-shadow: none;

    }

    .btn:focus {
        background-color: transparent;
        border: none;
        color: black;
        box-shadow: none;

    }

    .col-sm-1 {
        width: 15%;
    }

    /* cards section */

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

    .product-card:hover .product-desc {
        opacity: 1;
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
<div class="" style="padding: 25px 80px;background-color: #BCBDB8 ">
    <p class="col-lg-11 mx-auto text">Ознакомьтесь с нашим ассортиментом дизайнерской мебели, освещения, декора и сантехники, которые есть в наличии и готовы к быстрой доставке, чтобы вы смогли преобразовать свое жилое пространство качественно, точно и удобно. Мы гордимся тем, что предлагаем дизайнерскую мебель и сантехнику, изготовленную с максимальной тщательностью и точностью. Каждое изделие изготовлено из материалов премиум-класса, что обеспечивает прочность и долговечность.</p>
    <br>
    <p class="col-lg-11 mx-auto text">Не уверены, какой предмет подойдет для вашего дома или проекта? </br> Наша команда профессионалов в области дизайна интерьера всегда готова помочь вам найти идеальный предмет для вашего дома. Мы понимаем, что ваш дом уникален, и мы здесь, чтобы помочь вам сделать его по-настоящему вашим! Посетите наши шоурумы или сделайте покупки онлайн.</p>

    <div class="container mt-5">
        <div class="row">
            <div class="dropdown col-md-2">
                <button class="btn dropdown-toggle" type="button" id="categcategDropMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Категория
                </button>
                <ul class="dropdown-menu categories" id="categories" aria-labelledby="categcategDropMenuButton">
                    <li><a class="categ-dropdown-item chandelier" data-id="chandelier" href="#">Люстры</a></li>
                    <li><a class="categ-dropdown-item" data-id="chair" href="#">Стулья</a></li>
                    <li><a class="categ-dropdown-item" data-id="armchair" href="#">Кресла</a></li>
                    <li><a class="categ-dropdown-item" data-id="all" href="#">По умолчанию</a></li>
                </ul>
            </div>

            <div class="dropdown col-md-2">
                <button class="btn dropdown-toggle" type="button" id="categcategDropMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Бренд
                </button>
                <ul class="dropdown-menu" aria-labelledby="categcategDropMenuButton">
                    <li><a class="categ-dropdown-item" href="#">Istikbal</a></li>
                    <li><a class="categ-dropdown-item" href="#">Ikea</a></li>
                    <li><a class="categ-dropdown-item" href="#">Mebell</a></li>
                </ul>
            </div>
            <div class="dropdown col-md-2 ">
                <button class="btn dropdown-toggle" type="button" id="categcategDropMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Сортировать по
                </button>
                <ul class="dropdown-menu sorts" aria-labelledby="categcategDropMenuButton">
                    <li><a class="categ-dropdown-item" href="#" id="sort-asc">Цена по возрастанию</a></li>
                    <li><a class="categ-dropdown-item" href="#" id="sort-desc">Цена по убыванию</a></li>
                </ul>
            </div>

            <div class="col-md-2 d-flex right-align">
                <button class="clear-btn" type="button" id="clearButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Очистить
                </button>
            </div>
        </div>
    </div>
</div>

<div class="purchases" style="background-color: #E9E9E9;">
    <div class="container" style="padding-top: 35px;">
        <div class="row gy-1" id="nav">
            <!-- start -->
            <div class="products-grid">

                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="3">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">300TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="4">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">400TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="1">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">100TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="2">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">200TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="5">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">500TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="6">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">600TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="7">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">700TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="8">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">800TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="9">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">900TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="10">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text">illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1000TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea " id="content-price" data-sort="11">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1100TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="12">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1200TMT
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End -->
                <!-- start -->
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="13">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1300TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="14">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text">illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1400TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="15">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1500TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="16">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text">illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1600TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="17">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text">illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1700TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 armchair mebel" id="content-price" data-sort="18">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text">illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1800TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chandelier istikbal" id="content-price" data-sort="19">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">1900TMT
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-appearance col-lg-3 p-0 chair ikea" id="content-price" data-sort="20">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre" class="product-img">
                        <div class="product-desc">
                            <p class="product-text"> illo minima culpa officiis, velit pariatur iste eligendi
                                voluptatum
                                <img src="{{ asset('/images/product1.jpg') }}" alt="Cinque Terre"
                                    class="product-favorite">
                                cumque omnis? Aut facere quia
                                cupiditate rerum, reprehenderit aliquam eos, ipsam in
                            </p>
                            <p class="product-price">2000TMT
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <a href="#" id="loadMore"> Загрузить еще </a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let a = [50, 4, 12, 1, 3, 7, 6];
    for (let i = 0; i < a.length; i++) {
        for (let j = i; j < a.length; j++) {
            if (a[i] > a[j]) {
                let temp = a[i];
                a[i] = a[j];
                a[j] = temp;
            }
            // console.log(a);
        }
    }

    let originalOrder = [];
    const nav = document.querySelector('#nav');

    document.querySelectorAll('#nav > div').forEach((element, index) => {
        originalOrder.push({
            element,
            index
        });
    });

    document.querySelector('#sort-asc').onclick = mysort;
    document.querySelector('#sort-desc').onclick = mysortDesc;
    document.querySelector('#clearButton').onclick = resetOrder;

    function mysort() {
        for (let i = 0; i < nav.children.length; i++) {
            for (let j = i; j < nav.children.length; j++) {
                if (+nav.children[i].getAttribute('data-sort') > +nav.children[j].getAttribute('data-sort')) {
                    let replacedNode = nav.replaceChild(nav.children[j], nav.children[i]);
                    insertAfter(replacedNode, nav.children[i]);
                }
            }
        }
    }

    function mysortDesc() {
        for (let i = 0; i < nav.children.length; i++) {
            for (let j = i; j < nav.children.length; j++) {
                if (+nav.children[i].getAttribute('data-sort') < +nav.children[j].getAttribute('data-sort')) {
                    let replacedNode = nav.replaceChild(nav.children[j], nav.children[i]);
                    insertAfter(replacedNode, nav.children[i]);
                }
            }
        }
    }

    function insertAfter(elem, refElem) {
        return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
    }

    function resetOrder() {
        // Очистка содержимого nav
        while (nav.firstChild) {
            nav.removeChild(nav.firstChild);
        }

        // Восстановление исходного порядка
        originalOrder.sort((a, b) => a.index - b.index);
        originalOrder.forEach(item => {
            nav.appendChild(item.element);
        });
    }




    const list = document.querySelector('.categories'),
        items = document.querySelectorAll('.content-appearance')

    function filter() {
        list.addEventListener('click', event => {
            const targetId = event.target.dataset.id
            console.log(targetId)


            switch (targetId) {
                case 'all':
                    getItems('content-appearance').
                    break
                case 'chandelier':
                    getItems(targetId)
                    break
                case 'chair':
                    getItems(targetId)
                    break
                case 'armchair':
                    getItems(targetId)
                    break
            }
        })
    }
    filter()

    function getItems(calssName) {
        items.forEach(item => {
            if (item.classList.contains(calssName)) {
                item.style.display = 'block'
            } else {
                item.style.display = 'none'
            }
        })
    }

    function getItems(className) {
        let count = 0;
        items.forEach(item => {
            if (item.classList.contains(className)) {
                if (count < 12) {
                    item.style.display = 'block';
                    count++;
                } else {
                    item.style.display = 'none';
                }
            } else {
                item.style.display = 'none';
            }
        });
    }




    const clearButton = document.querySelector('.clear-btn');
    const contentItems = document.querySelectorAll('.content-appearance');

    clearButton.addEventListener('click', () => {
        resetItems();
    });

    function showFirstFourItems() {
        let count = 0;
        contentItems.forEach(item => {
            if (count < 12) {
                item.style.display = 'block';
                count++;
            } else {
                item.style.display = 'none';
            }
        });
    }

    function resetItems() {
        contentItems.forEach(item => {
            item.style.display = 'none';
        });
        $(".content-appearance").slice(0, 12).show();
        $("#loadMore").text("Загрузить еще").removeClass("noContent");
        $("#categcategDropMenuButton").text("Категории").removeClass("Категории");
    }


    $(document).ready(function() {
        $(".content-appearance").slice(0, 12).show();
        $("#loadMore").on("click", function(e) {
            e.preventDefault();
            $(".content-appearance:hidden").slice(0, 4).slideDown();
            if ($(".content-appearance:hidden").length == 0) {
                $("#loadMore").text("Нет элементов").addClass("noContent");
            }
        });

        const $categDropMenu = $('#categories');
        const $categDropdownButton = $('#categcategDropMenuButton');

        $categDropMenu.on('click', '.categ-dropdown-item', function(event) {
            const selectedText = $(this).text();
            $categDropdownButton.text(selectedText);
        });
    })
</script>
@include('layouts.footer')