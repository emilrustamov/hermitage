@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <h1>Admin - Contracts</h1>
    <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary mb-3">Create New Contract</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (RU)</th>
                <th>Status</th>
                <th>Image</th>
                <th>Plan Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr>
                <td>{{ $contract->title_ru }}</td>
                <td>{{ $contract->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($contract->image)
                        <img src="{{ asset('storage/' . $contract->image) }}" alt="image" style="max-height: 50px;">
                    @endif
                </td>
                <td>
                    @if ($contract->plan_image)
                        <img src="{{ asset('storage/' . $contract->plan_image) }}" alt="plan image" style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $contract->created_at }}</td>
                <td>{{ $contract->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contract?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $contracts->links() }}
    </div>
</div>

@include('layouts.footerA')
