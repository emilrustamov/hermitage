@php
       $banner = App\Models\Banner::where('page_identifier', 'about')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
<div class="container">
    {{-- <h2 class="mb-5">ПРОЕКТЫ</h2> --}}

    @foreach ($contracts as $year => $yearContracts)
        <h2 class="fw-bold my-5">{{ __('translation.contracts_page_title') }} | {{ $year }}</h2>
        <div class="row">
            @foreach ($yearContracts as $index => $contract)
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="mb-4">
                        <a href="{{ route('contracts.show', ['locale' => app()->getLocale(), 'id' => $contract->id]) }}">
                            <div class="proj-wrapper">
                                <img
                                    src="{{ asset($contract->image) }}" class="card-img-top black-photo"
                                    alt="{{ $contract->title }}"> 
                            </div>
                            </a>
                        <div class="card-body mt-3">
                            <a class="proj-a text-center "
                                href="{{ route('contracts.show', ['locale' => app()->getLocale(), 'id' => $contract->id]) }}">
                                <h5 class="card-title text-uppercase">{{ $contract->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>

                @if (($index + 1) % 3 == 0)
        </div>
        <div class="row">
    @endif
    @endforeach
</div>
@endforeach
</div>

@include('layouts.footer')
