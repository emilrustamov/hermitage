@include('layouts.header', ['slider' => false, 'image' => $image])

<div class="container mt-5">
    <h1 class="mb-5">{{ $data['title'] }}</h1>
    <p>{!! $data['description'] !!}</p>
    <div class="d-flex align-items-center all-v-link">
        <a href="{{ route('vacancies.index', ['locale' => app()->getLocale()]) }}">Все вакансии</a>
        <i class="fa fa-chevron-right"></i>
    </div>
</div>

@include('layouts.footer')
