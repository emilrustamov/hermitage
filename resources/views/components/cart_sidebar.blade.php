<!-- resources/views/cart.blade.php -->
<style>
    .cart-sidebar .cart-footer .checkout-btn {
        margin-left: unset !important;
        margin-right: unset !important;
        margin-top: 20px !important;
    }

    .order-form .form-group label {
        color: white;
        margin: 10px 0 15px;
    }

    .product-item {
        /* display: flex; */
        color: white;
        margin: 0 40px;
    }

    .quantity-control {
        display: flex;
        width: fit-content;
        align-items: center;
        border: 1px solid white;
        padding: 5px;
    }

    .quant {
        color: white;
        font-size: 16px;
        margin: 0 20px;
    }

    .decrease-quantity,
    .increase-quantity {
        background-color: transparent !important;
        outline: none;
        border: none;
        color: white;
        padding-bottom: 2px;
    }

    .product-price-info {
        opacity: 0.7;
        width: 60px;
    }

    .clear-cart {
        margin: 0 40px;
    }
</style>
<div class="cart-sidebar closed" id="sidebar">
    <div class="cart-header">
        <div class="d-flex align-items-center justify-content-between">
            <img src="{{ asset('/images/icons/close.png') }}" id="closeSidebar" alt="">
            <p class="fs-3">{{ __('translation.sid') }}</p>
        </div>
    </div>

    <div class="cart-items">
        <!-- Здесь будут добавляться товары динамически через JavaScript -->
    </div>

    <div class="cart-footer">
        <div class="total-sum d-flex justify-content-between">
            <p>{{ __('translation.sid_p1') }}</p>
            <p class="product-price text-center total-price">{{ __('translation.sid_p2') }}</p>
        </div>
        <div class="d-flex align-items-center shipment">
            <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
            <p class="my-auto">{{ __('translation.sid_p3') }}</p>
        </div>
        <!-- Кнопка для очистки корзины -->
        <div class="clear-cart">
            <button id="clearCart" class="btn btn-danger w-100 mt-3">{{ __('translation.sid_btn') }}</button>
        </div>

        <!-- Форма для оформления заказа -->
        <form id="orderForm" class="order-form">
            <div class="form-group">
                <label for="name">{{ __('translation.sid_label1') }}</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">{{ __('translation.sid_label2') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('translation.sid_label3') }}</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <button type="submit" class="checkout-btn d-flex justify-content-center align-items-center">
                <p class="my-auto mx-auto">{{ __('translation.sid_label4') }}</p>
                <i class="fa fa-long-arrow-right"></i>
            </button>
        </form>


    </div>
</div>
<script>
    var locale = '{{ app()->getLocale() }}';
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.querySelector('.cart-items');
            cartItems.innerHTML = ''; // Clear existing items
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

        function saveCart(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        loadCart();

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                let productId = this.dataset.id;
                let productTitle = this.dataset.title;
                let productPrice = parseFloat(this.dataset.price);
                let productImage = this.dataset.image;

                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const existingItem = cart.find(item => item.id === productId);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({
                        id: productId,
                        title: productTitle,
                        quantity: 1,
                        price: productPrice,
                        image: productImage,
                    });
                }

                saveCart(cart);
                loadCart();

                showToast('Товар добавлен в корзину');
            });
        });

        document.querySelector('.cart-items').addEventListener('click', function(event) {
            if (event.target.classList.contains('increase-quantity')) {
                event.stopPropagation(); // Предотвращаем закрытие корзины
                let productId = event.target.dataset.id;
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const item = cart.find(item => item.id === productId);
                if (item) {
                    item.quantity++;
                    saveCart(cart);
                    loadCart();
                }
            }

            if (event.target.classList.contains('decrease-quantity')) {
                event.stopPropagation(); // Предотвращаем закрытие корзины
                let productId = event.target.dataset.id;
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const item = cart.find(item => item.id === productId);
                if (item && item.quantity > 1) {
                    item.quantity--;
                    saveCart(cart);
                    loadCart();
                } else if (item && item.quantity === 1) {
                    const index = cart.indexOf(item);
                    cart.splice(index, 1);
                    saveCart(cart);
                    loadCart();
                }
            }
            if (event.target.classList.contains('fa-trash-can')) {
                event.stopPropagation(); // Предотвращаем закрытие корзины
                let button = event.target.closest('.remove-item');
                let productId = button.dataset.id;
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const itemIndex = cart.findIndex(item => item.id === productId);
                if (itemIndex > -1) {
                    cart.splice(itemIndex, 1);
                    saveCart(cart);
                    loadCart();
                }
            }
            // if (event.target.classList.contains('remove-item')) {
            //     event.stopPropagation(); // Предотвращаем закрытие корзины
            //     let productId = event.target.dataset.id;
            //     const cart = JSON.parse(localStorage.getItem('cart')) || [];
            //     const itemIndex = cart.findIndex(item => item.id === productId);
            //     if (itemIndex > -1) {
            //         cart.splice(itemIndex, 1);
            //         saveCart(cart);
            //         loadCart();
            //     }
            // }
        });

        document.getElementById('clearCart').addEventListener('click', function() {
            localStorage.removeItem('cart');
            loadCart();
        });

        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let total = parseFloat(document.querySelector('.total-price').textContent.replace(' TMT',
                '').replace(',', ''));

            let formData = new FormData(this);
            formData.append('products', JSON.stringify(cart));
            formData.append('total', total);

            // Логируем отправляемые данные
            console.log('Отправка данных:', Array.from(formData.entries()));
            console.log('Products:', JSON.stringify(cart));

            fetch(`/${locale}/orders`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    console.log('Ответ от сервера:', response);
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(text)
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Полученные данные:', data);
                    if (data.message === 'Order placed successfully') {
                        alert('Ваш заказ успешно оформлен');
                        localStorage.removeItem('cart');
                        document.querySelector('.cart-items').innerHTML = '';
                        document.querySelector('.total-price').textContent = '0,00 TMT';
                    } else {
                        alert('Произошла ошибка при оформлении заказа');
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при оформлении заказа: ' + error.message);
                });
        });

    });



    // Функции для работы с сайдбаром
    document.addEventListener('DOMContentLoaded', function() {
        var cartIcon = document.getElementById('cartIcon');
        var sidebar = document.getElementById('sidebar');
        var closeSidebar = document.getElementById('closeSidebar');

        cartIcon.addEventListener('click', function() {
            sidebar.classList.toggle('closed');
            console.log('хлоп');
            });

        closeSidebar.addEventListener('click', function() {
            sidebar.classList.add('closed');
            console.log('хлоп');

        });

        window.addEventListener('click', function(event) {
            if (event.target !== cartIcon && event.target !== sidebar && !sidebar.contains(event
                .target)) {
                sidebar.classList.add('closed');
            }
        });

        function openSidebar() {
            sidebar.classList.remove('closed');
        }

        document.querySelector('.cart-items').addEventListener('click', function(event) {
            if (event.target.classList.contains('increase-quantity') || event.target.classList.contains(
                    'decrease-quantity') || event.target.classList.contains('remove-item')) {
                event.stopPropagation(); // Предотвращаем закрытие корзины
            }
        });
    });

    function toggleSidebar() {
        var sidebarStyle = window.getComputedStyle(sidebar);
        var sidebarRight = sidebarStyle.getPropertyValue('right');

        if (sidebarRight === '0px' || sidebarRight === '0') {
            sidebar.style.right = '-27%';
        } else {
            sidebar.style.right = '0';
        }
    }

    function closeSidebarFunction() {
        sidebar.style.right = '-27%';
    }

    function showToast(message) {
        let toastEl = $('#liveToast');

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
