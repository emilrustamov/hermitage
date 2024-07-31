@php
    $banner = App\Models\Banner::where('page_identifier', 'threedmodels')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
<div class="container my-5">
    <div class="row">
        @foreach($models as $model)
            <div class="col-lg-4 thr-model">
                <div class="threed-wrapper">
                    <img src="{{ asset('storage/' . $model->image) }}" alt="{{ $model->title }}">
                    <div class="hover-content">
                        <div class="d-flex justify-content-between">
                            <p class="model-name">{{ $model->title }}</p>
                            <div class="btn-wrapper">
                                @if($model->file)
                                    <a href="{{ asset('storage/' . $model->file) }}" class="btn btn-primary" download>Download</a>
                                @else
                                    <button class="btn btn-secondary" disabled>No File</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')
