<!-- resources/views/cart.blade.php -->
<div class="cart-sidebar" id="sidebar">
    <div class="cart-header">
        <div class="d-flex align-items-center justify-content-between">
            <img src="{{ asset('/images/icons/close.png') }}" id="closeSidebar" alt="">
            <p class="fs-3">Корзина</p>
        </div>
    </div>

    <div class="cart-items">
        <!-- Здесь будут добавляться товары динамически через JavaScript -->
    </div>

    <div class="cart-footer">
        <div class="total-sum d-flex justify-content-between">
            <p>Общая сумма</p>
            <p class="product-price text-center total-price">0,00 TMT</p>
        </div>
        <div class="d-flex align-items-center shipment">
            <img src="{{ asset('/images/icons/shipment.png') }}" alt="">
            <p class="my-auto">Доставка осуществляется в течении 3-5 дней</p>
        </div>

        <!-- Форма для оформления заказа -->
        <form id="orderForm">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <button type="submit" class="checkout-btn d-flex justify-content-center align-items-center">
                <p class="my-auto mx-auto">Оформить заказ</p>
                <i class="fa fa-long-arrow-right"></i>
            </button>
        </form>


        <!-- Кнопка для очистки корзины -->
        <button id="clearCart" class="btn btn-danger w-100 mt-3">Очистить корзину</button>
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

            cart.forEach(item => {
                const itemHtml = `
                    <div class="product-item" data-id="${item.id}">
                        <p>${item.title}</p>
                        <div class="quantity-control">
                            <button class="decrease-quantity" data-id="${item.id}">-</button>
                            <p class="quant">${item.quantity}</p>
                            <button class="increase-quantity" data-id="${item.id}">+</button>
                        </div>
                        <p class="product-price">${item.price} TMT</p>
                    </div>
                `;
                cartItems.insertAdjacentHTML('beforeend', itemHtml);
                total += item.price * item.quantity;
            });

            document.querySelector('.total-price').textContent = `${total.toFixed(2)} TMT`;
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

                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const existingItem = cart.find(item => item.id === productId);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({
                        id: productId,
                        title: productTitle,
                        quantity: 1,
                        price: productPrice
                    });
                }

                saveCart(cart);
                loadCart();

                openSidebar();
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
    var cartIcon = document.getElementById('cartIcon');
    var sidebar = document.getElementById('sidebar');
    var closeSidebar = document.getElementById('closeSidebar');

    // Открываем/закрываем сайдбар при клике на иконку корзины
    cartIcon.addEventListener('click', function() {
        toggleSidebar();
    });

    // Закрываем сайдбар при клике на крестик
    closeSidebar.addEventListener('click', function() {
        closeSidebarFunction();
    });

    // Закрываем сайдбар при клике вне него
    window.addEventListener('click', function(event) {
        if (event.target !== cartIcon && event.target !== sidebar && !sidebar.contains(event.target)) {
            closeSidebarFunction();
        }
    });

    function openSidebar() {
        var sidebarStyle = window.getComputedStyle(sidebar);
        var sidebarRight = sidebarStyle.getPropertyValue('right');

        if (sidebarRight !== '0px' && sidebarRight !== '0') {
            sidebar.style.right = '0';
        }
    }

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
</script>
