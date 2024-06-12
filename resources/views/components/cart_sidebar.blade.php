<div class="cart-sidebar" id="sidebar">
    <div class="cart-header">
        <div class="d-flex align-items-center justify-content-between">
            <img src="{{ asset('/images/icons/close.png') }}" id="closeSidebar" alt="">
            <p class="fs-3">Корзина</p>
        </div>
    </div>
    <div class="d-flex">
        <button class="delete-item"><img src="{{ asset('/images/icons/bin.png') }}" alt=""></button>
        <div class="product-item d-flex  align-items-center">
            <div class="img-wrapper">
                <img src="{{ asset('/images/product1.jpg') }}" alt="lyustra" class="product-img">
            </div>
            <div class="product-info d-flex flex-column ml-3">
                <div class="d-flex name-w-delete align-items-center justify-content-between">
                    <p class="prod-name ">Skygarden 1 suspension lamp</p>
                    <button>
                        <img src="{{ asset('/images/icons/bin.png') }}" alt="">
                    </button>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="pr-info">Цена за единицу товара</p>
                    <p class=" product-price text-center mt-2">55 800,00 TMT</p>
                </div>
                <div class="d-flex align-items-center quant-btn">
                    <i class="fa fa-minus"></i>
                    <p class="quant my-auto">1</p>
                    <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-footer">
        <div class="total-sum alg=ign-items-center d-flex justify-content-between">
            <p>Общая сумма</p>
            <p class=" product-price text-center">55 800,00 TMT</p>

            </div>
                <div class="d-flex align-items-center shipment">
                    <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
                <p class="my-auto">Доставка осуществляется в течении 3-5 дней</p>
                </div>
                <button class="checkout-btn d-flex justify-content-center align-items-center">
                    <p class="my-auto mx-auto">Оформить заказ</p>
                    <i class="fa fa-long-arrow-right"></i>
                </button>
    </div>
</div>