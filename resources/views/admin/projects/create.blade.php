<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Create Project</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title_ru">Title (RU)</label>
                            <input type="text" class="form-control @error('title_ru') is-invalid @enderror"
                                id="title_ru" name="title_ru" required>
                            @error('title_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_ru">Description (RU)</label>
                            <textarea id="description_ru" class="form-control @error('description_ru') is-invalid @enderror" name="description_ru"
                                rows="4" required>1234</textarea>
                            @error('description_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_ru">Location (RU)</label>
                            <input type="text" class="form-control @error('location_ru') is-invalid @enderror"
                                id="location_ru" name="location_ru">
                            @error('location_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_ru">Designer (RU)</label>
                            <input type="text" class="form-control @error('designer_ru') is-invalid @enderror"
                                id="designer_ru" name="designer_ru">
                            @error('designer_ru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_ru">Architect (RU)</label>
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
                            <label for="title_en">Title (EN)</label>
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
                            <label for="description_en">Description (EN)</label>
                            <textarea id="description_en" class="form-control @error('description_en') is-invalid @enderror" name="description_en"
                                rows="4" required>124124</textarea>
                            @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_en">Location (EN)</label>
                            <input type="text" class="form-control @error('location_en') is-invalid @enderror"
                                id="location_en" name="location_en">
                            @error('location_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_en">Designer (EN)</label>
                            <input type="text" class="form-control @error('designer_en') is-invalid @enderror"
                                id="designer_en" name="designer_en">
                            @error('designer_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_en">Architect (EN)</label>
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
                            <label for="description_tk">Description (TK)</label>
                            <textarea id="description_tk" class="form-control @error('description_tk') is-invalid @enderror"
                                name="description_tk" rows="4" required>124214</textarea>
                            @error('description_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="location_tk">Location (TK)</label>
                            <input type="text" class="form-control @error('location_tk') is-invalid @enderror"
                                id="location_tk" name="location_tk">
                            @error('location_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="designer_tk">Designer (TK)</label>
                            <input type="text" class="form-control @error('designer_tk') is-invalid @enderror"
                                id="designer_tk" name="designer_tk">
                            @error('designer_tk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="architect_tk">Architect (TK)</label>
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
                    <label for="year">Year</label>
                    <input id="year" name="year" width="276"
                        class="form-control @error('year') is-invalid @enderror" />
                    @error('year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input id="image" class="form-control @error('image') is-invalid @enderror"
                            type="text" name="image">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                                type="button">
                                <i class="fa fa-picture-o"></i> Choose
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
                    <label for="plan_image">Plan Image</label>
                    <div class="input-group">
                        <input id="plan_image" class="form-control @error('plan_image') is-invalid @enderror"
                            type="text" name="plan_image">
                        <span class="input-group-append">
                            <button id="lfm2" data-input="plan_image" data-preview="holder2"
                                class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Choose
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
                                <i class="fa fa-picture-o"></i> Choose
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
                    <label for="photos">Photos</label>
                    <div class="input-group">
                        <input id="photos" class="form-control @error('photos') is-invalid @enderror" type="text" name="photos">
                        <span class="input-group-append">
                            <button id="lfm3" data-input="photos" data-preview="holder3" class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Choose
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
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            menu: {
                edit: {
                    title: 'Edit',
                    items: 'undo, redo, selectall'
                }
            }
        });
    </script>
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
</body>

</html>
