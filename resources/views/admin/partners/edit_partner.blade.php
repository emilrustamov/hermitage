@include('layouts.headerA', ['hasimage' => false])
<body>
    <div class="admin-index">
        <div class="container mt-5">
            <h1>Edit Partner</h1>
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $partner->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $partner->category_id ? 'selected' : '' }}>
                                {{ $category->title_ru }} 
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ordering">Ordering</label>
                    <input type="number" class="form-control" id="ordering" name="ordering" value="{{ old('ordering', $partner->ordering) }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input id="image" class="form-control" type="text" name="image" value="{{ old('image', $partner->image) }}">
                        <span class="input-group-append">
                            <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary" type="button">
                                <i class="fa fa-picture-o"></i> Choose
                            </button>
                        </span>
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ $partner->image ? Storage::url($partner->image) : '' }}">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $partner->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
