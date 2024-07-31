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
                <input type="text" class="form-control @error('page_identifier') is-invalid @enderror" id="page_identifier" name="page_identifier" value="{{ old('page_identifier') }}" required>
                @error('page_identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="banner">Image</label>
                <div class="input-group">
                    <input id="banner" class="form-control @error('banner') is-invalid @enderror" type="text" name="banner" value="{{ old('banner') }}">
                    <span class="input-group-append">
                        <button id="lfm" data-input="banner" data-preview="holder" class="btn btn-primary" type="button">
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

            <button type="submit" class="btn btn-primary">Add Banner</button>
        </form>
    </div>
</div>

@include('layouts.footerA')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    $('#lfm').filemanager('image');
</script>
