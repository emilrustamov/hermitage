@include('layouts.headerA', ['hasimage' => false])

<div class="projects">
    <h1>Admin - projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
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
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title_ru }}</td>
                <td>{{ $project->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($project->image)
                        <img src="{{ asset( $project->image) }}" alt="image"
                            style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $projects->links() }}
    </div>
</div>

@include('layouts.footerA')
