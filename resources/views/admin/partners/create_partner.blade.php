@include('layouts.headerA', ['hasimage' => false])

<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Create Partner</h1>
            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title_ru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ordering">Ordering</label>
                    <input type="number" class="form-control" id="ordering" name="ordering" required>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input id="image" class="form-control" type="text" name="image">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary"
                                type="button">
                                <i class="fa fa-picture-o"></i> Choose
                            </button>
                        </span>
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
    @include('layouts.footerA')

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
