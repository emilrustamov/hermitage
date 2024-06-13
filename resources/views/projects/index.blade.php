@include('layouts.header', ['slider' => true])

<div class="mt-5 container">
    <h1>Projects</h1>
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-6 col-lg-6 col-12">
                <div class="mb-4">
                    @if ($project->image == null)
                        <img src="{{ asset('/images/2.png') }}" class="card-img-top black-photo" alt="{{ $project->title }}" >
                    @else
                        <img src="{{ asset( $project->image) }}" class="card-img-top black-photo"
                            alt="{{ $project->title }}" >
                    @endif
                    <div class="card-body">
                        <a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'id' => $project->id]) }}">
                            <h5 class="card-title">{{ $project->title }}</h5>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $projects->links() }}
    </div>
</div>

@include('layouts.footer')
