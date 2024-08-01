@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Изменить блог</h1>
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab"
                            aria-controls="ru" aria-selected="true">Русский</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab"
                            aria-controls="en" aria-selected="false">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tk-tab" data-toggle="tab" href="#tk" role="tab"
                            aria-controls="tk" aria-selected="false">Türkmençe</a>
                    </li>
                </ul>
                <div class="tab-content" id="languageTabsContent">
                    <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                        <div class="form-group mt-3">
                            <label for="title_ru">Название (RU)</label>
                            <input type="text" class="form-control" id="title_ru" name="title_ru"
                                value="{{ $blog->title_ru }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description_ru">Описание (RU)</label>
                            <textarea class="form-control" id="description_ru" name="description_ru" rows="4">{{ $blog->description_ru }}</textarea>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group mt-3">
                            <label for="title_en">Название (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en"
                                value="{{ $blog->title_en }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Описание (EN)</label>
                            <textarea class="form-control" id="description_en" name="description_en" rows="4">{{ $blog->description_en }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                        <div class="form-group mt-3">
                            <label for="title_tk">Название (TK)</label>
                            <input type="text" class="form-control" id="title_tk" name="title_tk"
                                value="{{ $blog->title_tk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description_tk">Описание (TK)</label>
                            <textarea class="form-control" id="description_tk" name="description_tk" rows="4">{{ $blog->description_tk }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Фото</label>
                    <div class="input-group">
                        <input id="image" class="form-control" type="text" name="image"
                            value="{{ $blog->image }}">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                                type="button">
                                <i class="fa fa-picture-o"></i> Выбрать
                            </button>
                        </span>
                    </div>
                    @if ($blog->image)
                        <img id="holder" src="{{ asset($blog->image) }}" alt="Current Image"
                            class="img-thumbnail mt-2" width="200">
                    @endif
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                        {{ $blog->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Активация</label>
                </div>
                <button type="submit" class="btn btn-primary">Обновление</button>
            </form>
        </div>
    </div>


    @include('layouts.footerA')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    @include('components.forms.tinymce-editor')

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

</body>

</html>
