@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h3 class="text-uppercase fw-bold mb-5">{{ $data['title'] }}</h3>
    
    <div class="d-flex ">
        <p class="proj-title" style="margin-right: 3px">Дизайнер:</p> 
        <p>{{ $data['designer'] }}</p>
    </div>
    <div class="d-flex ">
        <p class="proj-title" style="margin-right: 3px">Архитектор:</p> 
        <p>{{ $data['architect'] }}</p>
    </div>
    <div class="d-flex ">
        <p class="proj-title" style="margin-right: 3px">Площадь:</p> 
        <p>{{ $data['area'] }} м²</p>
    </div>
    <div class="d-flex ">
        <p class="proj-title" style="margin-right: 3px">Локация:</p> 
        <p>{{ $data['location'] }}</p>
    </div>
    <div class="d-flex mr-2" >
        <p class="proj-title" style="margin-right: 3px">Год:</p> 
        <p>{{ $data['year'] }}</p>
    </div>
    <div class="description fs-5" style="background-color: transparent !important">
        <p class="fs-3">{!! $data['description'] !!}</p>
    </div>

    @if ($data['video'])
        <div class="embed-responsive embed-responsive-16by9 mb-4 d-flex justify-content-center">
            <iframe class="embed-responsive-item" src="{{ $data['video'] }}" allowfullscreen></iframe>
        </div>
    @endif

    @if ($data['plan_image'])
        <div class="mb-4 d-flex justify-content-center">
            <img src="{{ asset($data['plan_image']) }}" class="img-fluid" alt="Plan Image">
        </div>
    @endif

    @if (!empty($data['photos']))
        <div class="gallery row">
            @foreach ($data['photos'] as $photo)
                <div class="gallery-item col-lg-3 mb-4">
                    <a href="{{ asset($photo) }}" data-lightbox="gallery" data-title="Photo">
                        <img src="{{ asset($photo) }}" class="img-fluid" alt="Photo">
                    </a>
                </div>
            @endforeach
        </div>
    @endif
        <div class="with-black-links mb-5">
            <a class="show-all-a" href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="nav-link">{{ __('translation.all_projects_link') }}</a>
        </div>
</div>

@include('layouts.footer')
