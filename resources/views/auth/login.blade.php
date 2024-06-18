@extends('layouts.header', ['slider' => false])


@section('content')
    <div class="d-flex my-auto reg-content">
        <img class="photo-for-reg" src="{{ asset('/images/register-photo.jpg') }}" alt="reg">
        <div class=" form-reg w-50 my-auto justify-content-center">

            <p class="text-center reg-title">У меня уже есть аккаунт</p>
            <p class="text-center reg-sub">Пожалуйста,введите свои данные, </br> чтобы войти в свою учётную запись</p>
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
                        Авторизоваться
                    </button>
                    {{-- @if (Route::has('password.request')) --}}
                    <a href="{{ route('password.request', ['locale' => app()->getLocale()]) }}" class="log-a">Забыли пароль?</a>

                    {{-- @endif --}}
                </div>
            </form>
        </div>
    </div>
@endsection
