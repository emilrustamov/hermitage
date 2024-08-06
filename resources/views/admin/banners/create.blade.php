@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container">
        <h1>Add New Banner</h1>

        <!-- Вывод ошибок -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="page_identifier">Page Identifier</label>
                <input type="text" class="form-control @error('page_identifier') is-invalid @enderror"
                    id="page_identifier" name="page_identifier" value="{{ old('page_identifier') }}" required>
                @error('page_identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="banner">картинка</label>
                <div class="input-group">
                    <input id="banner" class="form-control @error('banner') is-invalid @enderror" type="text"
                        name="banner" value="{{ old('banner') }}">
                    <span class="input-group-append">
                        <button id="lfm" data-input="banner" data-preview="holder" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                @error('banner')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>

            <div class="form-group mt-3">
                <label for="video">Видео</label>
                <div class="input-group">
                    <input id="video" class="form-control @error('video') is-invalid @enderror" type="text" name="video" value="{{ old('video') }}">
                    <span class="input-group-append">
                        <button id="lfm-video" data-input="video" data-preview="holder-video" class="btn btn-primary" type="button">
                            <i class="fa fa-video-camera"></i> Выбрать
                        </button>
                    </span>
                </div>
                @error('video')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <video id="holder-video" style="margin-top:15px;max-height:100px;" controls>
                    <source src="{{ old('video') }}" type="video/mp4">
                </video>
            </div>
            

            <button type="submit" class="btn btn-primary">Добавить баннер</button>
        </form>
    </div>
</div>

@include('layouts.footerA')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    $('#lfm').filemanager('image');
    $('#lfm-video').filemanager('video');
</script>
