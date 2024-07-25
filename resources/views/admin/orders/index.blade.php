@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="container mt-5">
        <h1>Заказы</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Продукты</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @php
                                $products = json_decode($order->products, true);
                            @endphp
                            @foreach ($products as $product)
                            <li>{{ $product['title'] }} - {{ $product['quantity'] }} шт. ({{ $product['price'] }} TMT)</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }} TMT</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>В обработке</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Завершена</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Отменена</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
