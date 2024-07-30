@include('layouts.headerA', ['hasimage' => false])
<div class=" admin-index ">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1>Блог админа</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Создать новый блог</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название (RU)</th>
                <th>Статус</th>
                <th>Фото</th>
                <th>Создать</th>
                <th>Обновить</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title_ru }}</td>
                <td>{{ $blog->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($blog->image)
                        <img src="{{ asset( $blog->image) }}" alt="image"
                            style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $blog->created_at }}</td>
                <td>{{ $blog->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Изменит</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>

@include('layouts.footerA')
