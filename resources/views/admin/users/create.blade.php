@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="container">
        <h1>Создать Пользователья</h1>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтвердите пароль</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="enabled">Включено</option>
                    <option value="disabled">выключено</option>
                </select>
            </div>
            <div class="form-group">
                <label for="is_admin">Admin</label>
                <input type="checkbox" id="is_admin" name="is_admin">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
</div>

