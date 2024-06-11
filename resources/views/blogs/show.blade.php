@include('layouts.header')

<div class="container mt-5">
    <h1>{{ $data['title'] }}</h1>

    @if ($data['image'])
        <img src="{{ asset('storage/' . $data['image']) }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @else
        <img src="{{ asset('/images/placeholder.png') }}" class="img-fluid mb-4" alt="{{ $data['title'] }}">
    @endif

    <p>{!! $data['description'] !!}</p>

    <a href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}" >Все вакансии</a>
</div>

@include('layouts.footer')
