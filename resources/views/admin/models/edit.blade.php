@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="container my-5">
        <h1>Изменить модель</h1>
        <form action="{{ route('admin.models.update', $model->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $model->title) }}" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="ordering">Заказ</label>
                <input type="number" class="form-control @error('ordering') is-invalid @enderror" id="ordering" name="ordering" value="{{ old('ordering', $model->ordering) }}" required>
                @error('ordering')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="image">Фото</label>
                <div class="input-group">
                    <input id="image" class="form-control @error('image') is-invalid @enderror" type="text"
                        name="image" value="{{ $model->image }}">
                    <span class="input-group-append">
                        <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Выбрать
                        </button>
                    </span>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        @enderror
                </div>
                @if ($model->image)
                    <img id="holder" src="{{ asset($model->image) }}" alt="Current Image"
                        class="img-thumbnail mt-2" width="200">
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="file">Файл</label>
                <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($model->file)
                    <a href="{{ asset('storage/' . $model->file) }}" download>Текущий файл</a>
                @endif
            </div>
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', $model->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Действие</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Обновить модель</button>
        </form>
    </div>
</div>
@include('layouts.footerA')

@include('layouts.footerA')
<script>
    $('#lfm').filemanager('image');
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

