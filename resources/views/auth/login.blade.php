@php
    $banner = App\Models\Banner::where('page_identifier', 'about')->first();
    $certificates = App\Models\Certificate::orderBy('ordering')->get();
@endphp

@include('layouts.header', [
    'slider' => false,
    'banner' => $banner ? $banner->banner : null,
    'show_single_slide' => false,
])


<div class="d-flex my-auto reg-content">
    <img class="photo-for-reg" src="{{ asset('/images/register-photo.jpg') }}" alt="reg">
    <div class=" form-reg w-50 my-auto justify-content-center">

        <p class="text-center reg-title">{{ __('translation.auth_p1')}}</p>
        <p class="text-center reg-sub">{!! nl2br(e(__('translation.auth_p2'))) !!}</p>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="d-flex justify-content-center">
                <div class="required">
                    <input id="email" type="email" class="form-control   @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Электронная почта">
                    <div class="required-sign"></div>
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-center">
                <div class="required">
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Пароль">
                    <div class="required-sign"></div>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>




            <div class="row mb-0 justify-content-center mx-auto">
                <button type="submit" class="reg-btn">
                    {{ __('translation.auth_btn')}}
                </button>
                {{-- @if (Route::has('password.request')) --}}
                <a href="{{ route('password.request', ['locale' => app()->getLocale()]) }}" class="log-a">{{ __('translation.auth_forgot')}}</a>

                {{-- @endif --}}
            </div>
        </form>
    </div>
</div>
