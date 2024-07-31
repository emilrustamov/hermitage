    @php
        $banner = App\Models\Banner::where('page_identifier', 'about')->first();
    @endphp

    @include('layouts.header', [
        'slider' => false,
        'banner' => $banner ? $banner->banner : null,
    ])
    <div class="container p-5 about-cont">
        <div class="left-div">
            <h2 class="fw-bold">{{ __('translation.about') }}</h2>
        </div>
        <div class="w-50 mx-auto text-center p-twntw fw-bold my-5 scroll-fade-in">
            {!! nl2br(e(__('translation.about_p'))) !!}
        </div>
        <div class="w-100">

            <div class="">
                <h1 class="fw-bold mb-5 p-sxtn">{{ __('translation.about_h1') }}</h1>
                <p class="p-sxtn">{{ __('translation.about_h1_2') }}
                </p>
                <p class="p-sxtn">{{ __('translation.about_h1_3') }}
                </p>
                <p class="p-sxtn">{{ __('translation.about_h1_4') }}
                </p>

            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 scroll-fade-in mt-5">
                <div class="img-wrapper">
                    <img class="img-fluid" src="{{ asset('/images/red-bath.jpg') }}">
                </div>

            </div>
            <div class="col-lg-6 align-self-center scroll-fade-in d-flex flex-column text-center">
                <div>
                    <div class="p-twntw  fw-bold">{!! nl2br(e(__('translation.fw_bold'))) !!}</div>
                </div>
            </div>
            <div class="col-lg-6 scroll-fade-in align-self-center ">
                <a class="p-twntw fw-bold" style="cursor: pointer">
                    {{ __('translation.fw_bold_0') }}
                </a>
                <p class="p-sxtn">{{ __('translation.fw_bold_p') }}</p>
                <ul>
                    <li class="p-sxtn">{{ __('translation.fw_bold_li') }}</li>
                    <li class="p-sxtn">{{ __('translation.fw_bold_li_2') }}</li>
                    <li class="p-sxtn">{{ __('translation.fw_bold_li_3') }}</li>
                </ul>
            </div>
            <div class="col-lg-6 d-flex flex-column scroll-fade-in mt-3">
                <div class="img-wrapper">
                    <img class="img-fluid " src="{{ asset('/images/two-proj-men.png') }}">
                </div>

            </div>
            <div class="col-lg-6 d-flex flex-column scroll-fade-in mt-5">
                <div class="img-wrapper">
                    <img class="img-fluid" src="{{ asset('/images/bw-proj.jpg') }}">
                </div>
                <a class="p-twntw fw-bold mt-5" style="cursor: pointer">
                    {{ __('translation.projects') }}
                </a>
                <p class="p-sxtn">
                    {{ __('translation.projects_p') }}
                </p>
            </div>
            <div class="col-lg-6 align-self-start scroll-fade-in mt-5">
                <a class="p-twntw fw-bold" style="cursor: pointer">
                    {{ __('translation.contracts') }}
                </a>
                <p class="p-sxtn">
                    {{ __('translation.contracts_p') }}
                </p>
            </div>

            <div class="col-lg-12 text-center scroll-fade-in">
                <button class="download-btn">{{ __('translation.btn_presentation') }}<i class="fa fa-download"
                        aria-hidden="true"></i></button>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    <style>
        .right-div,
        .left-div {
            max-width: 50%;

        }

        .right-div {
            text-align: right;

            margin-left: auto;
        }

        .right-div p {
            line-height: normal;

        }

        .left-div {
            text-align: left;

            margin-right: auto;
        }

        .left-div p {
            line-height: normal;
        }
    </style>
