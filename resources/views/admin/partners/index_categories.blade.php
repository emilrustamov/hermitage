@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <div class="container mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between mb-5">
                    <h1>Categories</h1>
                    <a href="{{ route('admin.partners.categories.create') }}" class="btn btn-primary mb-3">Создать категории</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название (RU)</th>
                            <th>Название (EN)</th>
                            <th>Название (TK)</th>
                            <th>Активация</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title_ru }}</td>
                                <td>{{ $category->title_en }}</td>
                                <td>{{ $category->title_tk }}</td>
                                <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.partners.categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.partners.categories.destroy', $category->id) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
        <script>
            function confirmDelete() {
                return confirm('Are you sure you want to delete this category?');
            }
        </script>
</body>

</html>
