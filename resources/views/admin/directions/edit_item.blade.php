@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container mt-5">
        <h1>Edit Direction Item</h1>
        <form action="{{ route('admin.directions.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                            {{ $category->title_ru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="poster_img">Poster Image</label>
                <div class="input-group">
                    <input id="poster_img" class="form-control" type="text" name="poster_img" value="{{ $item->poster_img }}">
                    <span class="input-group-append">
                        <button id="lfm1" data-input="poster_img" data-preview="holder1" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <img id="holder1" src="{{ asset($item->poster_img) }}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group mt-3">
                <label for="partner_logo">Partner Logo</label>
                <div class="input-group">
                    <input id="partner_logo" class="form-control" type="text" name="partner_logo" value="{{ $item->partner_logo }}">
                    <span class="input-group-append">
                        <button id="lfm2" data-input="partner_logo" data-preview="holder2" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <img id="holder2" src="{{ asset($item->partner_logo) }}" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="form-group mt-3">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ $item->link }}">
            </div>
            <div class="form-group mt-3">
                <label for="images">Images</label>
                <div class="input-group">
                    <input id="images" class="form-control" type="text" name="images" value="{{ implode(',', json_decode($item->images, true) ?? []) }}">
                    <span class="input-group-append">
                        <button id="lfm3" data-input="images" data-preview="holder3" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <div id="holder3" style="margin-top:15px;max-height:100px;">
                    @foreach(json_decode($item->images, true) ?? [] as $image)
                        <img src="{{ asset($image) }}" style="max-height: 50px;">
                    @endforeach
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="videos">Videos</label>
                <div class="input-group">
                    <input id="videos" class="form-control" type="text" name="videos" value="{{ implode(',', json_decode($item->videos, true) ?? []) }}">
                    <span class="input-group-append">
                        <button id="lfm4" data-input="videos" data-preview="holder4" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-video-camera"></i> Choose
                        </button>
                    </span>
                </div>
                <div id="holder4" style="margin-top:15px;max-height:100px;">
                    @foreach(json_decode($item->videos, true) ?? [] as $video)
                        <video src="{{ asset($video) }}" controls style="max-height: 50px;"></video>
                    @endforeach
                </div>
            </div>
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
                        <textarea id="description_ru" class="form-control tinymce-editor" name="description_ru" rows="4" required>{{ $item->description_ru }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                    <div class="form-group mt-3">
                        <textarea id="description_en" class="form-control tinymce-editor" name="description_en" rows="4" required>{{ $item->description_en }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="tk" role="tabpanel" aria-labelledby="tk-tab">
                    <div class="form-group mt-3">
                        <textarea id="description_tk" class="form-control tinymce-editor" name="description_tk" rows="4" required>{{ $item->description_tk }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="ordering">Ordering</label>
                <input type="number" class="form-control" id="ordering" name="ordering" value="{{ $item->ordering }}" required>
            </div>
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $item->is_active ? 'checked' : '' }}>
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
    $('#lfm1').filemanager('image');
    $('#lfm2').filemanager('image');
    $('#lfm3').filemanager('image');
    $('#lfm4').filemanager('video');
</script>