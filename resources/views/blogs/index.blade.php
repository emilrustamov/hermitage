@include('layouts.header', ['slider' => true])

<div class="container mt-5">
    <h2 class="mb-5">Блог</h2>
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 col-lg-4 col-12">
                <div class="mb-4">
                    <div class="blog-wrapper">
                        <a class="blog-a"
                            href="{{ route('blogs.show', ['locale' => app()->getLocale(), 'id' => $blog->id]) }}"> <img
                                src="{{ asset($blog->image) }}" class="card-img-top black-photo"
                                alt="{{ $blog->title }}">  </a>
                    </div>
                    <div class="card-body mt-3">
                        <a class="blog-a"
                            href="{{ route('blogs.show', ['locale' => app()->getLocale(), 'id' => $blog->id]) }}">
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
