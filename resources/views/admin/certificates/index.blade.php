@include('layouts.headerA', ['hasimage' => false])


    <div class="container">
        <h1>Manage Certificates</h1>

        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary mb-3">Add New Certificate</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ordering</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{ $certificate->ordering }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $certificate->image) }}" style="max-height: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.certificates.edit', $certificate->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

