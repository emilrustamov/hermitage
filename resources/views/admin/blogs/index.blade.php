@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1>Admin - Blogs</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New blog</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (RU)</th>
                <th>Status</th>
                <th>Image</th>
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
                <td>
                    @if ($blog->image)
                        <img src="{{ asset($blog->image) }}" alt="image" style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $blog->created_at }}</td>
                <td>{{ $blog->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</button>
                    </form>
                    <button class="btn btn-info btn-sm send-newsletter" data-id="{{ $blog->id }}">Send Newsletter</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>

@include('layouts.footerA')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.send-newsletter').forEach(button => {
            button.addEventListener('click', function() {
                let blogId = this.dataset.id;

                fetch(`/admin/subscriber/send-newsletter/blog/${blogId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Newsletter sent successfully');
                    } else {
                        alert('Error sending newsletter: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
