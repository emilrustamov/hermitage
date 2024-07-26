@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h1>
            <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
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
                            <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $product->title_ru ?? '' }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group mt-3">
                            <label for="title_en">Title (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $product->title_en ?? '' }}" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                        <div class="form-group mt-3">
                            <label for="title_tk">Title (TK)</label>
                            <input type="text" class="form-control" id="title_tk" name="title_tk" value="{{ $product->title_tk ?? '' }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input id="image" class="form-control" type="text" name="image" value="{{ $product->image ?? '' }}">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Choose
                            </button>
                        </span>
                    </div>
                    @if(isset($product->image))
                        <img id="holder" src="{{ asset($product->image) }}" style="margin-top:15px;max-height:100px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="order">Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $product->order ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title_ru }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" class="form-control" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ isset($product) && $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->title_ru }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ isset($product) && $product->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <div class="form-group form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="is_new" name="is_new" {{ isset($product) && $product->is_new ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_new">New</label>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
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
