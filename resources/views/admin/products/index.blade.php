@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <div class="d-flex justify-content-between mb-5">
                <h1>Продукты</h1>
                <div class="d-flex">

                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Создать продукт</a>
                    <a href="{{ route('admin.products.categories.index') }}" class="btn btn-primary mb-3">Категории</a>
                    <a href="{{ route('admin.products.brands.index') }}" class="btn btn-primary mb-3">Бренды</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Активный</th>
                        <th>Фото</th>
                        <th>Порядок</th>
                        <th>Цена</th>
                        <th>Категории</th>
                        <th>Бренд</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title_ru }}</td>
                            <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="image" style="max-height: 50px;">
                                @endif
                            </td>
                            <td>{{ $product->order }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->title_ru }}</td>
                            <td>{{ $product->brand->title_ru }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Изменить</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    
</body>

</html>
