@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Edit Category</h1>
            <form action="{{ route('admin.products.categories.update', $category->id) }}" method="POST">
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
                            <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $category->title_ru }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group mt-3">
                            <label for="title_en">Title (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $category->title_en }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                        <div class="form-group mt-3">
                            <label for="title_tk">Title (TK)</label>
                            <input type="text" class="form-control" id="title_tk" name="title_tk" value="{{ $category->title_tk }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $category->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
