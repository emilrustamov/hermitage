@include('layouts.headerA', ['hasimage' => false])
<div class="admin-index">
    <div class="container my-5">
        <h1>Edit Model</h1>
        <form action="{{ route('admin.models.update', $model->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $model->title) }}" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="ordering">Ordering</label>
                <input type="number" class="form-control @error('ordering') is-invalid @enderror" id="ordering" name="ordering" value="{{ old('ordering', $model->ordering) }}" required>
                @error('ordering')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($model->image)
                    <img src="{{ asset('storage/' . $model->image) }}" alt="image" style="max-height: 100px;">
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="file">File</label>
                <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($model->file)
                    <a href="{{ asset('storage/' . $model->file) }}" download>Current File</a>
                @endif
            </div>
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', $model->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Model</button>
        </form>
    </div>
</div>
@include('layouts.footerA')
