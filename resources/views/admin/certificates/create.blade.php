@include('layouts.headerA', ['hasimage' => false])


<div class="admin-index">
    <div class="container">
        <h1>Add New Certificate</h1>
    
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="ordering">Ordering</label>
                <input type="number" class="form-control" id="ordering" name="ordering" required>
            </div>
    
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Add Certificate</button>
        </form>
    </div>
</div>
