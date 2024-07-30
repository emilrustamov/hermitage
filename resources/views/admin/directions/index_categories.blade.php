@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Admin - Direction Categories</h1>
        <a href="{{ route('admin.directions.categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (RU)</th>
                <th>Status</th>
                <th>Image</th>
                <th>Ordering</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->title_ru }}</td>
                <td>{{ $category->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($category->main_image)
                        <img src="{{ asset($category->main_image) }}" alt="image" style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $category->ordering }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.directions.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.directions.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>

@include('layouts.footerA')
