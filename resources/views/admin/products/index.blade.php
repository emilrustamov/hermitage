@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <div class="d-flex justify-content-between mb-5">
                <h1>Products</h1>
                <div class="d-flex">

                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Create Product</a>
                    <a href="{{ route('admin.products.categories.index') }}" class="btn btn-primary mb-3">Categories</a>
                    <a href="{{ route('admin.products.brands.index') }}" class="btn btn-primary mb-3">Brands</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title_ru }}</td>
                            <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="image" style="max-height: 50px;">
                                @endif
                            </td>
                            <td>{{ $product->order }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->title_ru }}</td>
                            <td>{{ $product->brand->title_ru }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    
</body>

</html>
