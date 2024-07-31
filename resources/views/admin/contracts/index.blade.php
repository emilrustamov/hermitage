@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <h1>Список контрактов</h1>
    <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary mb-3">Создать новый контракт</a>
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
                    <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-warning btn-sm">Изменить</a>
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
