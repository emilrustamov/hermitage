@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="d-flex justify-content-between">
        <h1>Вакансии Админа</h1>
        <a href="{{ route('admin.vacancies.create') }}" class="btn btn-primary mb-3">Создать новую вакансию</a>
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
            @foreach($vacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->title_ru }}</td>
                <td>{{ $vacancy->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($vacancy->image)
                        <img src="{{ asset( $vacancy->image) }}" alt="image"
                            style="max-height: 50px;">
                    @endif
                </td>
                <td>{{ $vacancy->created_at }}</td>
                <td>{{ $vacancy->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="btn btn-warning btn-sm">Изменить</a>
                    <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vacancy?');">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $vacancies->links() }}
    </div>
</div>

@include('layouts.footerA')
