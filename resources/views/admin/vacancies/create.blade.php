@include('layouts.headerA', ['hasimage' => false])



<div class="admin-index">
    <div class="container mt-5">
        <h1>Создать вакансии</h1>
        <form action="{{ route('admin.vacancies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab"
                        aria-controls="ru" aria-selected="true">Русский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en"
                        aria-selected="false">English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tk-tab" data-toggle="tab" href="#tk" role="tab" aria-controls="tk"
                        aria-selected="false">Türkmençe</a>
                </li>
            </ul>
            <div class="tab-content" id="languageTabsContent">
                <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                    <div class="form-group mt-3">
                        <label for="title_ru">Название (RU)</label>
                        <input type="text" class="form-control" id="title_ru" name="title_ru" required>
                    </div>
    
                    <div class="form-group">
                        <textarea id="description_ru" class="form-control" name="description_ru" rows="4" ></textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                    <div class="form-group mt-3">
                        <label for="title_en">Название (EN)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" required>
                    </div>
                    <div class="form-group">
                        <textarea id="description_en" class="form-control" name="description_en" rows="4" ></textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                    <div class="form-group mt-3">
                        <label for="title_tk">Название (TK)</label>
                        <input type="text" class="form-control" id="title_tk" name="title_tk" required>
                    </div>
    
                    <div class="form-group">
    
                        <textarea id="description_tk" class="form-control" name="description_tk" rows="4" ></textarea>
    
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="image">Фото</label>
                <div class="input-group">
                    <input id="image" class="form-control" type="text" name="image">
                    <span class="input-group-append">
                        <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Выбрать
                        </button>
                    </span>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>
    
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">Активный</label>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
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