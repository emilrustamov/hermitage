@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Список проектов</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Создать новый проект</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название (RU)</th>
                <th>Статус</th>
                <th>Фото</th>
                <th>План фото</th>
                <th>Создать</th>
                <th>Обновить</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title_ru }}</td>
                <td>{{ $project->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($project->image)
                        <img src="{{ asset($project->image) }}" alt="image" style="max-height: 50px;">
                    @endif
                </td>
                <td>
                    @if ($project->plan_image)
                        <img src="{{ asset($project->plan_image) }}" alt="plan image" style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Изменить</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?');">Удалить</button>
                    </form>
                    <button class="btn btn-info btn-sm send-newsletter" data-id="{{ $project->id }}">Send Newsletter</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.send-newsletter').forEach(button => {
            button.addEventListener('click', function() {
                let projectId = this.dataset.id;

                fetch(`/admin/subscriber/send-newsletter/project/${projectId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Newsletter sent successfully');
                    } else {
                        alert('Error sending newsletter: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
