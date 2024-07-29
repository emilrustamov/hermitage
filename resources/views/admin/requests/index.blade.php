@include('layouts.headerA', ['hasimage' => false])


<div class="admin-index">
    <div class="container mt-5">
        <h1>Заявки на расчет</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Тип</th>
                    <th>Состав работы</th>
                    <th>Площадь</th>
                    <th>Локация</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Сообщение</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->user ? $request->user->name : 'Гость' }}</td>
                        <td>{{ $request->type }}</td>
                        <td>{{ implode(', ', $request->work_scope) }}</td>
                        <td>{{ $request->area }}</td>
                        <td>{{ $request->location }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->phone }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->message }}</td>
                        <td>{{ $request->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

