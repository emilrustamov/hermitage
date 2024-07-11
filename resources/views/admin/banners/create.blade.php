@extends('layouts.headerA', ['hasimage' => false])

<div class="admin-index">
    <div class="container">
        <h1>Add New Banner</h1>

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="page_identifier">Page Identifier</label>
                <input type="text" class="form-control" id="page_identifier" name="page_identifier" required>
            </div>

            <div class="form-group">
                <label for="banner">Banner</label>
                <input type="file" class="form-control-file" id="banner" name="banner">
            </div>

            <button type="submit" class="btn btn-primary">Add Banner</button>
        </form>
    </div>
</div>

