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
                <input id="image" class="form-control" type="text" name="image" value="{{ $banner->image }}">
                <span class="input-group-append">
                    <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                        type="button">
                        <i class="fa fa-picture-o"></i> Choose
                    </button>
                </span>
            </div>
            @if ($banner->banner)
                <img src="{{ asset('storage/' . $banner->banner) }}" class="img-fluid mt-2" style="max-height: 200px;">
            @endif
    </div>



    <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
