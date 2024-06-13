<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partners</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Partners</h1>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mb-3">Create Partner</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Ordering</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td>{{ $partner->title }}</td>
                        <td>{{ $partner->category->title_ru }}</td>
                        <td>{{ $partner->ordering }}</td>
                        <td>
                            @if ($partner->image)
                                <img src="{{ asset('storage/' . $partner->image) }}" alt="image"
                                    style="max-height: 50px;">
                            @endif
                        </td>
                        <td>{{ $partner->is_active ? 'Yes' : 'No' }}</td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
