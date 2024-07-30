@include('layouts.headerA', ['hasimage' => false])



<div class="admin-index">
    <div class="container">
    <h1>Изменит сертификат</h1>

    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ordering">Заказ</label>
            <input type="number" class="form-control" id="ordering" name="ordering" value="{{ $certificate->ordering }}" required>
        </div>

        <div class="form-group">
            <label for="image">Фото</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if ($certificate->image)
                <img src="{{ asset('storage/' . $certificate->image) }}" class="img-fluid mt-2" style="max-height: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Обновить сертификат</button>
    </form>
</div>
    </div>

