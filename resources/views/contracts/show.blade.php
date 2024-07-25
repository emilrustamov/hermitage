@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h3 class="text-uppercase fw-bold">{{ $data['title'] }}</h3>
    
    <div class="d-flex">
        <p>Дизайнер:</p> {{ $data['designer'] }}
    </div>
    <div class="d-flex">
        <p>Архитектор:</p> {{ $data['architect'] }}
    </div>
    <div class="d-flex">
        <p>Площадь:</p> {{ $data['area'] }} м²
    </div>
    <div class="d-flex">
        <p>Локация:</p> {{ $data['location'] }}
    </div>
    <div class="d-flex">
        <p>Год:</p> {{ $data['year'] }}
    </div>
    {{-- <div>{{ $data['created_at'] }}</div> --}}
    
    {{-- @if ($data['image'])
        <img src="{{ asset($data['image']) }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @else
        <img src="{{ asset('/images/placeholder.png') }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @endif --}}

    <p class="fs-3">{!! $data['description'] !!}</p>

    @if ($data['video'])
        <div class="embed-responsive embed-responsive-16by9 mb-4">
            <iframe class="embed-responsive-item" src="{{ $data['video'] }}" allowfullscreen></iframe>
        </div>
    @endif

    @if ($data['plan_image'])
        <div class="mb-4">
            <img src="{{ asset($data['plan_image']) }}" class="img-fluid" alt="Plan Image">
        </div>
    @endif

    @if (!empty($data['photos']))
        <div class="gallery">
            @foreach ($data['photos'] as $photo)
                <div class="gallery-item">
                    <img src="{{ asset($photo) }}" class="img-fluid" alt="Photo">
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}">Все проекты</a>
</div>

@include('layouts.footer')