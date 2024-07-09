@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Categories</h1>
            <a href="{{ route('admin.products.categories.create') }}" class="btn btn-primary mb-3">Create Category</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title_ru }}</td>
                            <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.products.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.products.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
