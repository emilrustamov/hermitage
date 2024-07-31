@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <div class="d-flex justify-content-between mb-5">
                <h1>Партнеры</h1>
                <div class="d-flex">
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mb-3">Создать партнера</a>
                    <a href="{{ route('admin.partners.categories.index') }}" class="btn btn-primary mb-3">Категории</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Названик</th>
                        <th>Активный</th>
                        <th>Фото</th>
                        <th>Категории</th>
                        <th>Порядок сортировки</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>{{ $partner->title }}</td>
                            <td>{{ $partner->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                @if ($partner->image)
                                    <img src="{{ asset($partner->image) }}" alt="image" style="max-height: 50px;">
                                @endif
                            </td>
                            <td>{{ $partner->category->title_ru }}</td>
                            <td>{{ $partner->ordering }}</td>
    
                            <td>
                                <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                    class="btn btn-warning btn-sm">Изменить</a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
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
            {{ $partners->links() }}
        </div>
    </div>
    
</body>

</html>
