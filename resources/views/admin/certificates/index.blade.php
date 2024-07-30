@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1>Менеджер сертификатов</h1>
    
            <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary mb-3">Добавить новый сертификат</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заказ</th>
                    <th>Фото</th>
                    <th>Действие</th>
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
                                class="btn btn-warning">Изменить</a>
                            <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

