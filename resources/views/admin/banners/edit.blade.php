@include('layouts.headerA', ['hasimage' => false])


<div class="admin-index">
    <div class="container">
        <h1>Edit Banner for {{ $banner->page_identifier }}</h1>

        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="page_identifier">Page Identifier</label>
                <input type="text" class="form-control" id="page_identifier" name="page_identifier"
                    value="{{ $banner->page_identifier }}" required>
            </div>

            <div class="form-group">
                <label for="banner">Banner</label>
                <input id="banner" class="form-control @error('banner') is-invalid @enderror" type="text" name="banner" value="{{ old('banner') }}">
                <span class="input-group-append">
                    <button id="lfm" data-input="banner" data-preview="holder" class="btn btn-primary mt-3"
                        type="button">
                        <i class="fa fa-picture-o"></i> Choose
                    </button>
                </span>
            </div>
            @if ($banner->banner)
                <img src="{{ asset('storage/' . $banner->banner) }}" class="img-fluid mt-2" style="max-height: 200px;">
            @endif
    </div>



    <button type="submit" class="btn btn-primary mt-3">Update Banner</button>
    </form>
</div>
</div>
@include('layouts.footerA')

<script>
    $('#lfm').filemanager('image');
</script>
