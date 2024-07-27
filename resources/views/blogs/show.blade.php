@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h1>{{ $data['title'] }}</h1>

    <p>{!! $data['description'] !!}</p>

    <a href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}" >Все блоги</a>
</div>

@include('layouts.footer')
