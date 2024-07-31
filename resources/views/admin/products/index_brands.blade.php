@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Бренд</h1>
            <a href="{{ route('admin.products.brands.create') }}" class="btn btn-primary mb-3">Create Brand</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Активный</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->title_ru }}</td>
                            <td>{{ $brand->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.products.brands.edit', $brand->id) }}"
                                    class="btn btn-warning btn-sm">Изменить</a>
                                <form action="{{ route('admin.products.brands.destroy', $brand->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $brands->links() }}
        </div>
    </div>

</body>

</html>
