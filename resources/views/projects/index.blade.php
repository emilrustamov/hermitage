@include('layouts.header', ['slider' => true])

<div class="mt-5 container">
    <h1>Projects</h1>

    @foreach ($projects as $year => $yearProjects)
        <h2>{{ $year }}</h2>
        <div class="row">
            @foreach ($yearProjects as $index => $project)
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="mb-4">
                        <img src="{{ asset($project->image) }}" class="card-img-top black-photo" alt="{{ $project->title }}">
                        <div class="card-body">
                            <a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'id' => $project->id]) }}">
                                <h5 class="card-title">{{ $project->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>

                @if (($index + 1) % 3 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
    @endforeach
</div>

@include('layouts.footer')
