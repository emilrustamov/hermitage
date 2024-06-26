@include('layouts.header', ['slider' => true])
    <section class="fav-sect">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column justify-content-around" style="background-color: #202020;">
                <div class="d-flex flex-column">
                    <h1 class="mb-5 text-white align-self-center">Избранные товары</h1>
                    <div class="mt-5 text-white fs-3 text-center align-self-center">Сохраняйте понравившиеся товары и
                        просматривайте их в любое время</div>
                </div>
                <div></div>
            </div>
            <div class="col-lg-8 p-0">
                <div class="slider-wrapper ">
                    <div class=" fav-slider d-flex align-items-center">
                        <div class="product-item d-flex justify-content-center align-items-center">
                            <div class="img-wrapper">
                                <img src="{{ asset('/images/product1.jpg') }}" alt="lyustra" class="product-img">
                            </div>
                            <div class="product-info d-flex flex-column ml-3">
                                <div class="d-flex name-w-delete align-items-center justify-content-between">
                                    <p class="fs-4 my-auto">Skygarden 1 suspension lamp</p>
                                    <button>
                                        <img src="{{ asset('/images/icons/bin.png') }}" alt="">
                                    </button>
                                </div>
                                <p class="fs-5 product-price text-center mt-2">55 800,00 TMT</p>
                                <div class="d-flex align-items-center shipment">
                                    <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
                                    <p class=" my-auto text-center">Доставка осуществляется в течении 3-5 дней</p>
                                </div>
                            <button class="mx-auto buy-btn">Купить прямо сейчас</button>
                            </div>
                        </div>
                        <div class="product-item d-flex justify-content-center align-items-center">
                            <div class="img-wrapper">
                                <img src="{{ asset('/images/product1.jpg') }}" alt="lyustra" class="product-img">
                            </div>
                            <div class="product-info d-flex flex-column ml-3">
                                <div class="d-flex name-w-delete align-items-center justify-content-between">
                                    <p class="fs-4 my-auto">Skygarden 1 suspension lamp</p>
                                    <button>
                                        <img src="{{ asset('/images/icons/bin.png') }}" alt="">
                                    </button>
                                </div>
                                <p class="fs-5 product-price text-center mt-2">55 800,00 TMT</p>
                                <div class="d-flex align-items-center shipment">
                                    <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
                                    <p class=" my-auto text-center">Доставка осуществляется в течении 3-5 дней</p>
                                </div>
                            <button class="mx-auto buy-btn">Купить прямо сейчас</button>
                            </div>
                        </div>
                        <div class="product-item d-flex justify-content-center align-items-center">
                            <div class="img-wrapper">
                                <img src="{{ asset('/images/product1.jpg') }}" alt="lyustra" class="product-img">
                            </div>
                            <div class="product-info d-flex flex-column ml-3">
                                <div class="d-flex name-w-delete align-items-center justify-content-between">
                                    <p class="fs-4 my-auto">Skygarden 1 suspension lamp</p>
                                    <button>
                                        <img src="{{ asset('/images/icons/bin.png') }}" alt="">
                                    </button>
                                </div>
                                <p class="fs-5 product-price text-center mt-2">55 800,00 TMT</p>
                                <div class="d-flex align-items-center shipment">
                                    <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
                                    <p class=" my-auto text-center">Доставка осуществляется в течении 3-5 дней</p>
                                </div>
                            <button class="mx-auto buy-btn">Купить прямо сейчас</button>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('layouts.footer')