@include('layouts.header', ['slider' => true])

<div class="mt-5">
    <h1>Vacancies1</h1>
    <div class="row">
        @foreach ($vacancies as $vacancy)
            <div class="col-md-6 col-lg-6 col-12">
                <div class="mb-4">
                    @if ($vacancy->image == null)
                        <img src="{{ asset('/images/2.png') }}" class="card-img-top black-photo" alt="{{ $vacancy->title }}" >
                    @else
                        <img src="{{ asset('storage/' . $vacancy->image) }}" class="card-img-top black-photo"
                            alt="{{ $vacancy->title }}" >
                    @endif
                    <div class="card-body">
                        <a href="{{ route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}">
                            <h5 class="card-title">{{ $vacancy->title }}</h5>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $vacancies->links() }}
    </div>
</div>

@include('layouts.footer')
