@php
    $banner = App\Models\Banner::where('page_identifier', 'partners')->first();
    $categories = App\Models\PartnerCategory::where('is_active', true)->get();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])

<div class=" container">
    @foreach ($categories as $category)
        <h4 class="text-center mt-5">{{ $category['title_' . app()->getLocale()] }}</h2>
            <div class="row">
                <div class="logo-slider col-lg-11 m-auto">
                    @php
                        $partners = $category->partners()->where('is_active', true)->orderBy('ordering')->get();
                    @endphp

                    @foreach ($partners as $partner)
                        <div class="partners-logo p-3 col-lg-8">
                            @if ($partner->image)
                               <a href='{{$partner->link}}'> <img src="{{ asset($partner->image) }}" alt="{{ $partner->title }}"></a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
    @endforeach

    @if ($categories->isEmpty())
        <p>No partner categories found.</p>
    @endif

    {{-- <div class="mt-5">
        <form action="{{ route('partners.index', ['locale' => app()->getLocale()]) }}" method="GET" class="mb-4">
            <div class="form-group">
                <label for="category_id">Filter by Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>
                            {{ $category['title_' . app()->getLocale()] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div> --}}
</div>



@include('layouts.footer')
