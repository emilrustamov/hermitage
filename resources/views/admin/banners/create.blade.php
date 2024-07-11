@include('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container">
        <h1>Add New Banner</h1>

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="page_identifier">Page Identifier</label>
                <input type="text" class="form-control" id="page_identifier" name="page_identifier" required>
            </div>

            <div class="form-group mt-3">
                <label for="banner">Image</label>
                <div class="input-group">
                    <input id="banner" class="form-control" type="text" name="banner">
                    <span class="input-group-append">
                        <button id="lfm" data-input="banner" data-preview="holder" class="btn btn-primary"
                            type="button">
                            <i class="fa fa-picture-o"></i> Choose
                        </button>
                    </span>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>

            <button type="submit" class="btn btn-primary">Add Banner</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
