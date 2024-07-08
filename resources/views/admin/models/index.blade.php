@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1>Admin - Models</h1>
        <a href="{{ route('admin.models.create') }}" class="btn btn-primary mb-3">Create New Model</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Ordering</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->title }}</td>
                <td>
                    @if ($model->image)
                        <img src="{{ asset('storage/' . $model->image) }}" alt="image" style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $model->is_active ? 'Active' : 'Inactive' }}</td>
                <td>{{ $model->ordering }}</td>
                <td>{{ $model->created_at }}</td>
                <td>{{ $model->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.models.edit', $model->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.models.destroy', $model->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this model?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $models->links() }}
    </div>
</div>
@include('layouts.footerA')
