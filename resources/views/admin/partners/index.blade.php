@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <div class="d-flex justify-content-between mb-5">
                <h1>Partners</h1>
                <div class="d-flex">
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mb-3">Create Partner</a>
                    <a href="{{ route('admin.partners.categories.index') }}" class="btn btn-primary mb-3">Категории</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Ordering</th>
                        <th>Actions</th>
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
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                    style="display:inline-block;">
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
            {{ $partners->links() }}
        </div>
    </div>
    
</body>

</html>
