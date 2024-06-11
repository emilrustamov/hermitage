<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Vacancy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Create Vacancy</h1>
        <form action="{{ route('admin.vacancies.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="title_ru" name="title_ru" required>
                    </div>

                    <div class="form-group">
                        <textarea id="description_ru" class="form-control" name="description_ru" rows="4" required>A simple menubar change.</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                    <div class="form-group mt-3">
                        <label for="title_en">Title (EN)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" required>
                    </div>
                    <div class="form-group">
                        <textarea id="description_en" class="form-control" name="description_en" rows="4" required>A simple menubar change.</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                    <div class="form-group mt-3">
                        <label for="title_tk">Title (TK)</label>
                        <input type="text" class="form-control" id="title_tk" name="title_tk" required>
                    </div>

                    <div class="form-group">

                        <textarea id="description_tk" class="form-control" name="description_tk" rows="4" required>A simple menubar change.</textarea>

                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <div class="input-group">
                    <input id="image" class="form-control" type="text" name="image">
                    <span class="input-group-append">
                        <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary" type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>
            
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea', // change this value according to your HTML
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
    </script>
</body>

</html>
