@include('layouts.header', ['slider' => true])

<section class="aboutSctn">
    <div class="row py-5">
        <div class="col-lg-8 text-center">
            <img src="{{ asset('/images/main-reception.jpg') }}" class="mx-auto img-fluid ">
        </div>
        <div class="col-lg-4 align-self-center d-flex flex-column">
            <h2>{{ __('translation.about') }}</h2>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, nulla? Magnam blanditiis
                nam debitis ratione eaque quas odit est ullam nesciunt hic quaerat obcaecati quisquam,
                vitae officia ipsa tempora recusandae.
            </div>
            <button>Узнать больше ÇZÜÄ</button>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
            <h2 class=" text-white align-self-center">Направления</h2>
            <div class="fs-4 text-white align-self-center">Ознакомьтесь с нашими направлениями</div>
            <a href="#" class="text-uppercase  align-self-center" style="color: white;">посмотреть все</a>
        </div>
        <div class="col-lg-8 p-0">
            <div class="regular slider">
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/mebel.png') }}" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/svet.jpg') }}" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-lg-3 prdct p-0" style="background-color: white">
            <img src="{{ asset('/images/product1.jpg') }}" class="w-100 h-100">
            <div class="prc">
                <div>skygarden 1 suspersion lamp</div>
                <div class="text-end">50 000, 00 TMT</div>
            </div>
        </div>
        <div class="col-lg-3 prdct p-0" style="background-color: white">
            <img src="{{ asset('/images/product2.jpg') }}" class="w-100 h-100">
            <div class="prc">
                <div>skygarden 1 suspersion lamp</div>
                <div class="text-end">50 000, 00 TMT</div>
            </div>
        </div>
        <div class="col-lg-6 position-relative p-0">
            <img src="{{ asset('/images/zal1.jpg') }}" class="w-100 h-100 ">
            <h2 class="text-white textImageL2">Ассортимент</h3>
                <h3 class="text-white textImageL">Мебель</h3>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
            <h2 class=" text-white align-self-center">Направления</h2>
            <div class="fs-4 text-white align-self-center">Ознакомьтесь с нашими направлениями</div>
            <a href="#" class="text-uppercase  align-self-center" style="color: white; ">посмотреть все</a>
        </div>
        <div class="col-lg-8 p-0">
            <div class="regular slider">
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/kuhnya.jpg') }}" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Проекты</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="{{ asset('/images/zazhig.jpg') }}" class="img-fluid mx-auto w-100 " alt="">
                    <h3 class="text-white textImageC">Контракты</h3>
                </div>

                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
                <div class="position-relative brdr">
                    <img src="/images/2.png" class="img-fluid mx-auto w-100 h-100" alt="">
                    <h3 class="text-white textImageC">Мебель</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-lg-6 position-relative p-0">
            <img src="{{ asset('/images/home0.jpg') }}" class="w-100 h-100 ">
            <h2 class="text-white textImageL2">Новости</h3>
                <h3 class="text-white textImageL">Будьте в курсе всех наших событий</h3>
        </div>
        <div class="col-lg-3 position-relative  p-0" style="background-color: white">
            <img src="{{ asset('/images/home1.jpg') }}" class="w-100 h-100">
            <h3 class="text-white textImageC2 text-center">Неделя дизайна в Милане: Salone del Mobile. Милан 2024</h3>
        </div>
        <div class="col-lg-3 position-relative  p-0" style="background-color: white">
            <img src="{{ asset('/images/home2.jpg') }}" class="w-100 h-100">
            <h3 class="text-white textImageC2 text-center">Открытие третьего шоурума на 10-летие компании</h3>
        </div>
    </div>
</section>


@include('layouts.footer')
