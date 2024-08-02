@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Создать контракт</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.contracts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                            <input type="text" class="form-control @error('title_ru') is-invalid @enderror"
                                id="title_ru" name="title_ru" required>
                            @error('title_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_ru">Описание (RU)</label>
                            <textarea id="description_ru" class="form-control @error('description_ru') is-invalid @enderror" name="description_ru"
                                rows="4" ></textarea>
                            @error('description_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_ru">Локация (RU)</label>
                            <input type="text" class="form-control @error('location_ru') is-invalid @enderror"
                                id="location_ru" name="location_ru">
                            @error('location_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_ru">Дизайнер (RU)</label>
                            <input type="text" class="form-control @error('designer_ru') is-invalid @enderror"
                                id="designer_ru" name="designer_ru">
                            @error('designer_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_ru">Архитект (RU)</label>
                            <input type="text" class="form-control @error('architect_ru') is-invalid @enderror"
                                id="architect_ru" name="architect_ru">
                            @error('architect_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group mt-3">
                            <label for="title_en">Название (EN)</label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="title_en" name="title_en" required>
                            @error('title_en
                                ')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_en">Описание (EN)</label>
                            <textarea id="description_en" class="form-control @error('description_en') is-invalid @enderror" name="description_en"
                                rows="4"></textarea>
                            @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_en">Локация (EN)</label>
                            <input type="text" class="form-control @error('location_en') is-invalid @enderror"
                                id="location_en" name="location_en">
                            @error('location_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_en">Дизайнер (EN)</label>
                            <input type="text" class="form-control @error('designer_en') is-invalid @enderror"
                                id="designer_en" name="designer_en">
                            @error('designer_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_en">Архитект (EN)</label>
                            <input type="text" class="form-control @error('architect_en') is-invalid @enderror"
                                id="architect_en" name="architect_en">
                            @error('architect_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                        <div class="form-group mt-3">
                            <label for="title_tk">Title (TK)</label>
                            <input type="text" class="form-control @error('title_tk') is-invalid @enderror"
                                id="title_tk" name="title_tk" required>
                            @error('title_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_tk">Описание (TK)</label>
                            <textarea id="description_tk" class="form-control @error('description_tk') is-invalid @enderror"
                                name="description_tk" rows="4" ></textarea>
                            @error('description_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_tk">Локация (TK)</label>
                            <input type="text" class="form-control @error('location_tk') is-invalid @enderror"
                                id="location_tk" name="location_tk">
                            @error('location_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_tk">Дизайнер (TK)</label>
                            <input type="text" class="form-control @error('designer_tk') is-invalid @enderror"
                                id="designer_tk" name="designer_tk">
                            @error('designer_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_tk">Архитект (TK)</label>
                            <input type="text" class="form-control @error('architect_tk') is-invalid @enderror"
                                id="architect_tk" name="architect_tk">
                            @error('architect_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="year">Год</label>
                    <input id="year" name="year" width="276"
                        class="form-control @error('year') is-invalid @enderror" />
                    @error('year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="image">Фото</label>
                    <div class="input-group">
                        <input id="image" class="form-control @error('image') is-invalid @enderror"
                            type="text" name="image">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                                type="button">
                                <i class="fa fa-picture-o"></i> Выбрать
                            </button>
                        </span>
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="plan_image">План фото</label>
                    <div class="input-group">
                        <input id="plan_image" class="form-control @error('plan_image') is-invalid @enderror"
                            type="text" name="plan_image">
                        <span class="input-group-append">
                            <button id="lfm2" data-input="plan_image" data-preview="holder2"
                                class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Выбрать
                            </button>
                        </span>
                    </div>
                    <img id="holder2" style="margin-top:15px;max-height:100px;">
                    @error('plan_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="video">Video</label>
                    <div class="input-group">
                        <input id="video" class="form-control @error('video') is-invalid @enderror"
                            type="text" name="video">
                        <span class="input-group-append">
                            <button id="lfm1" data-input="video" data-preview="holder" class="btn btn-primary"
                                type="button">
                                <i class="fa fa-picture-o"></i> Выбрать
                            </button>
                        </span>
                    </div>
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="photos">Фотографии</label>
                    <div class="input-group">
                        <input id="photos" class="form-control @error('photos') is-invalid @enderror"
                            type="text" name="photos">
                        <span class="input-group-append">
                            <button id="lfm3" data-input="photos" data-preview="holder3"
                                class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Выбрать
                            </button>
                        </span>
                    </div>
                    <img id="holder3" style="margin-top:15px;max-height:100px;">
                    @error('photos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                    <label class="form-check-label" for="is_active">Действие</label>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>



    @include('layouts.footerA')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    @include('components.forms.tinymce-editor')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('file');
        $('#lfm2').filemanager('image');
        $('#lfm3').filemanager('image'); // используем image для файлового менеджера фотографий
    </script>
    {{-- <script>
        $('#year').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script> --}}
