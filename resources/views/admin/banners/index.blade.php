@include('layouts.headerA', ['hasimage' => false])

<div class="container">
    <h1>Manage Banners</h1>

    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Add New Banner</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Page Identifier</th>
                <th>Banner</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->page_identifier }}</td>
                    <td>
                        @if ($banner->banner)
                            <img src="{{ asset('storage/' . $banner->banner) }}" class="img-fluid" style="max-height: 100px;">
                        @else
                            No banner
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

