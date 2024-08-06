@php
    $banner = App\Models\Banner::where('page_identifier', 'about')->first();
    $certificates = App\Models\Certificate::orderBy('ordering')->get();
@endphp

@include('layouts.header', [
    'slider' => false,
    'banner' => $banner ? $banner->banner : null,
    'show_single_slide' => false,
])

<div class="d-flex reg-content">
    <img class="photo-for-reg" src="{{ asset('/images/register-photo.jpg') }}" alt="reg">
    <div class="form-reg w-50 justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="text-center reg-title">{{ __('translation.reg_p1') }}</p>
        <p class="text-center reg-sub">{{ __('translation.reg_p2') }}</p>


        <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
            @csrf
            <div class="mx-auto d-flex justify-content-center name-w-sur">

                <div class="" style="margin-right:20px">
                    <div class="required">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="{{ __('translation.sid_label1') }}">
                        <div class="required-sign"></div>
                    </div>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <div class="required">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                            name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                            placeholder="{{ __('translation.surnm') }}">
                        <div class="required-sign"></div>
                    </div>

                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <input id="company" type="text" class="company-input @error('company_name') is-invalid @enderror"
                    name="company_name" value="{{ old('company_name') }}" autocomplete="company"
                    placeholder="{{ __('translation.namComp') }}">

                @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <div class="required">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="{{ __('translation.mail') }}">
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
                    <input id="contacts" type="tel" class="form-control @error('contact') is-invalid @enderror"
                        name="contact" required autocomplete="contacts"
                        placeholder="{{ __('translation.foot_contact') }}">
                    <div class="required-sign"></div>
                </div>

                @error('contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <div class="required">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password"
                        placeholder="{{ __('translation.passw') }}">
                    <div class="required-sign"></div>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="d-flex justify-content-center">
                <div class="required">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="{{ __('translation.confPassw') }}">
                    <div class="required-sign"></div>
                </div>
            </div>
            <p class="pass-clue mt-2 mb-2">{{ __('translation.reg_p3') }}</p>
            <div class="mt-2 mb-3 d-flex align-items-center  justify-content-center">
                <input type="checkbox" class="my-auto checkbox-input" name="subscribe_to_blog" id="subscribe_to_blog"
                    {{ old('subscribe_to_blog') ? 'checked' : '' }}>
                <label for="subscribe_to_blog" class="agr-lab">{{ __('translation.reg_p4') }}</label>
            </div>

            <div class="mt-2 mb-3 d-flex align-items-center justify-content-center">
                <input type="checkbox" name="remember" id="remember" class="my-auto checkbox-input">
                <label for="remember" class="agr-lab">{{ __('translation.remember_me') }}</label>
            </div>

            <div class="row mb-0 justify-content-center mx-auto">
                <button type="submit" class="reg-btn">
                    {{ __('translation.reg_btn') }}
                </button>
                <a href="{{ route('login', ['locale' => app()->getLocale()]) }}   "
                    class="log-a">{{ __('translation.reg_a') }}</a>
            </div>
        </form>
    </div>
</div>
@include('layouts.footer')
