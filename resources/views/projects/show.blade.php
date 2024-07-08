@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h1>{{ $data['title'] }}</h1>
    
    <div>
        <strong>Дизайнер:</strong> {{ $data['designer'] }}
    </div>
    <div>
        <strong>Архитектор:</strong> {{ $data['architect'] }}
    </div>
    <div>
        <strong>Площадь:</strong> {{ $data['area'] }} м²
    </div>
    <div>
        <strong>Локация:</strong> {{ $data['location'] }}
    </div>
    <div>
        <strong>Год:</strong> {{ $data['year'] }}
    </div>
    {{-- <div>{{ $data['created_at'] }}</div> --}}
    
    {{-- @if ($data['image'])
        <img src="{{ asset($data['image']) }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @else
        <img src="{{ asset('/images/placeholder.png') }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @endif --}}

    <p>{!! $data['description'] !!}</p>

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

    <a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}">Все проекты</a>
</div>

@include('layouts.footer')
