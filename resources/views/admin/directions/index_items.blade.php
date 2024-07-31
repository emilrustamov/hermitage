@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Admin - Direction Items</h1>
        <a href="{{ route('admin.directions.items.create') }}" class="btn btn-primary mb-3">Create New Item</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category</th>
                <th>Poster Image</th>
                <th>Partner Logo</th>
                <th>Link</th>
                <th>Status</th>
                <th>Ordering</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->category->title_ru }}</td>
                    <td>
                        @if ($item->poster_img)
                            <img src="{{ asset($item->poster_img) }}" alt="poster image" style="max-height: 50px;">
                        @endif
                    </td>
                    <td>
                        @if ($item->partner_logo)
                            <img src="{{ asset($item->partner_logo) }}" alt="partner logo" style="max-height: 50px;">
                        @endif
                    </td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $item->ordering }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.directions.items.edit', $item->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.directions.items.destroy', $item->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>
</div>

@include('layouts.footerA')
