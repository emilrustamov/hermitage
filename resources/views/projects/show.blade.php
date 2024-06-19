@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h1>{{ $data['title'] }}</h1>
    <div>{{ $data['created_at'] }} </div>

    @if ($data['image'])
        <img src="{{ asset($data['image']) }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @else
        <img src="{{ asset('/images/placeholder.png') }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @endif

    <p>{!! $data['description'] !!}</p>

    <a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" >Все проекты</a>
</div>

@include('layouts.footer')
