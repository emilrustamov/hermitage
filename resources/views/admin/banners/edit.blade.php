@include('layouts.headerA', ['hasimage' => false])


<div class="admin-index">
    <div class="container">
        <h1>Edit Banner for {{ $banner->page_identifier }}</h1>
    
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <label for="page_identifier">Page Identifier</label>
                <input type="text" class="form-control" id="page_identifier" name="page_identifier" value="{{ $banner->page_identifier }}" required>
            </div>
    
            <div class="form-group">
                <label for="banner">Banner</label>
                <input type="file" class="form-control-file" id="banner" name="banner">
                @if ($banner->banner)
                    <img src="{{ asset('storage/' . $banner->banner) }}" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>
    
            <button type="submit" class="btn btn-primary">Update Banner</button>
        </form>
    </div>
</div>

