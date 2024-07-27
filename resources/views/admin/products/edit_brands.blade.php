@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <h1>{{ isset($brand) ? 'Edit Brand' : 'Create Brand' }}</h1>
            <form action="{{ isset($brand) ? route('admin.products.brands.update', $brand->id) : route('admin.products.brands.store') }}" method="POST">
                @csrf
                @if(isset($brand))
                    @method('PUT')
                @endif
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
                            <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $brand->title_ru ?? '' }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group mt-3">
                            <label for="title_en">Title (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $brand->title_en ?? '' }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                        <div class="form-group mt-3">
                            <label for="title_tk">Title (TK)</label>
                            <input type="text" class="form-control" id="title_tk" name="title_tk" value="{{ $brand->title_tk ?? '' }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ isset($brand) && $brand->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($brand) ? 'Update' : 'Create' }}</button>
            </form>
        </div>
    </div>
    @include('layouts.footerA')
</body>

</html>
