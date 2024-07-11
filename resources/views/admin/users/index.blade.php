@include('layouts.headerA', ['hasimage' => false])

<div class="container">
    <h1>Users</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('admin.users.updateStatus', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status"
                                value="{{ $user->status === 'enabled' ? 'disabled' : 'enabled' }}">
                            <button type="submit" class="btn btn-secondary">
                                {{ $user->status === 'enabled' ? 'Disable' : 'Enable' }}
                            </button>
                        </form>
                        @if ($user->is_admin)
                            <form action="{{ route('admin.users.unmakeAdmin', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">Unmake Admin</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.makeAdmin', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">Make Admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>