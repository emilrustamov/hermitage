@include('layouts.headerA', ['hasimage' => false])


<div class="admin-index">
    <div class="container">
        <h1>Добавить новый сертификат</h1>
    
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="ordering">Заказ</label>
                <input type="number" class="form-control" id="ordering" name="ordering" required>
            </div>
    
            <div class="form-group mt-3">
                <label for="image">Фото</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Добавить сертификать</button>
        </form>
    </div>
</div>
