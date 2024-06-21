@include('layouts.header', ['slider' => true])

<div class="container mt-5">
    <h1>Blogs</h1>
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-6 col-12">
                <div class="mb-4">
                    <img src="{{ asset($blog->image) }}" class="card-img-top black-photo" alt="{{ $blog->title }}">
                    <div class="card-body">
                        <a href="{{ route('blogs.show', ['locale' => app()->getLocale(), 'id' => $blog->id]) }}">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $blogs->links() }}
    </div>
</div>

@include('layouts.footer')
