@include('layouts.header')

<div class="mt-5">
    <h1>Admin - Blogs</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New blog</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (RU)</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title_ru }}</td>
                <td>{{ $blog->is_active ? 'Active' : 'Inactive' }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>{{ $blog->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>

@include('layouts.footer')
