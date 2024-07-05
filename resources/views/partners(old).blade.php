@php
    $banner = App\Models\Banner::where('page_identifier', 'partners')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])

<div class="mt-5 container">
    <form action="{{ route('partners.index', ['locale' => app()->getLocale()]) }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="category_id">{{ __('translation.filter_by_category') }}</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">{{ __('translation.all_categories') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>
                        {{ $category['title_' . app()->getLocale()] }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row">
        @foreach ($partners as $partner)
            <div class="partners-logo p-3 col-lg-2">
                @if ($partner->image)
                    <img src="{{ asset($partner->image) }}" alt="{{ $partner->title }}">
               
                @endif
            </div>
        @endforeach
    </div>
</div>


@include('layouts.footer')
