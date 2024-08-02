@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container mt-5">
        <h1>Edit Direction Category</h1>
        <form action="{{ route('admin.directions.categories.update', $category->id) }}" method="POST"
            enctype="multipart/form-data">
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
                        <label for="title_ru">Title (RU)</label>
                        <input type="text" class="form-control" id="title_ru" name="title_ru"
                            value="{{ $category->title_ru }}" required>
                    </div>
                    <div class="form-group">
                        <textarea id="description_ru" class="form-control tinymce-editor" name="description_ru" rows="4">{{ $category->description_ru }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                    <div class="form-group mt-3">
                        <label for="title_en">Title (EN)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en"
                            value="{{ $category->title_en }}" required>
                    </div>
                    <div class="form-group">
                        <textarea id="description_en" class="form-control tinymce-editor" name="description_en" rows="4">{{ $category->description_en }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                    <div class="form-group mt-3">
                        <label for="title_tk">Title (TK)</label>
                        <input type="text" class="form-control" id="title_tk" name="title_tk"
                            value="{{ $category->title_tk }}" required>
                    </div>
                    <div class="form-group">
                        <textarea id="description_tk" class="form-control tinymce-editor" name="description_tk" rows="4">{{ $category->description_tk }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="main_image">Main Image</label>
                <div class="input-group">
                    <input id="main_image" class="form-control" type="text" name="main_image"
                        value="{{ $category->main_image }}">
                    <span class="input-group-append">
                        <button id="lfm" data-input="main_image" data-preview="holder" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <img id="holder" src="{{ asset($category->main_image) }}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group mt-3">
                <label for="ordering">Ordering</label>
                <input type="number" class="form-control" id="ordering" name="ordering"
                    value="{{ $category->ordering }}" required>
            </div>
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                    {{ $category->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

@include('components.forms.tinymce-editor')

@include('layouts.footerA')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
