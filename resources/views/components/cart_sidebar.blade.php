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
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Обработчик отправки формы
        document.getElementById('orderForm').addEventListener('submit', function (e) {
            e.preventDefault();
            
            let products = [];
            let total = parseFloat(document.querySelector('.total-price').textContent.replace(' TMT', '').replace(',', ''));
            document.querySelectorAll('.cart-items .product-item').forEach(item => {
                products.push({
                    id: item.dataset.id,
                    quantity: parseInt(item.querySelector('.quant').textContent),
                    price: parseFloat(item.querySelector('.product-price').textContent.replace(' TMT', '').replace(',', ''))
                });
            });

            let formData = new FormData(this);
            formData.append('products', JSON.stringify(products));
            formData.append('total', total);

            fetch('{{ route("orders.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Order placed successfully') {
                    alert('Ваш заказ успешно оформлен');
                    // Очистка корзины
                    document.querySelector('.cart-items').innerHTML = '';
                    document.querySelector('.total-price').textContent = '0,00 TMT';
                } else {
                    alert('Произошла ошибка при оформлении заказа');
                }
            })
            .catch(error => console.error('Ошибка:', error));
        });
    });
</script>
