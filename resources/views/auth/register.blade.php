@extends('layouts.header', ['slider' => false])

@section('content')
    <div class="d-flex reg-content">
        <img class="photo-for-reg" src="{{ asset('/images/register-photo.jpg') }}" alt="reg">
        <div class=" form-reg w-50  justify-content-center">

            <p class="text-center reg-title">Я новый клиент</p>
            <p class="text-center reg-sub">Пожалуйста, зарегистрируйтесь чтобы создать </br> учётную запись</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mx-auto d-flex justify-content-center name-w-sur">

                    <div class="" style="margin-right:20px">
                        <div class="required">
                            <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Имя">
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
                            <input id="surname" type="text" class="form-control  @error('surname') is-invalid @enderror"
                                name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                                placeholder="Фамилия">
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
                    <input id="company" type="text" class="company-input  @error('company') is-invalid @enderror"
                        name="company" value="{{ old('company') }}"  autocomplete="company"
                        placeholder="Название компании">

                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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



                <div class="d-flex justify-content-center">
                    <div class="required">
                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required
                            autocomplete="new-password" placeholder="Подтвердите пароль">
                        <div class="required-sign"></div>
                    </div>
                </div>
                <p class="pass-clue mt-2 mb-2">Пароль должен: быть длиной не менее 8 символов, содержать как  буквы, так и цифры</p>
                <div class="d-flex justify-content-center">
                    <div class="required">
                        <input id="contacts" type="tel" class="form-control " name="contacts" required
                            autocomplete="contacts" placeholder="Контакты">
                        <div class="required-sign"></div>
                    </div>
                </div>
                <div class="mt-2 mb-3 d-flex align-items-center  justify-content-center">
                    <input type="checkbox" class="my-auto checkbox-input" name="agreement">
                    <label for="agreement" class="agr-lab">Я бы хотел получать рассылки на электронную почту</label>
                </div>
                <div class="row mb-0 justify-content-center mx-auto">
                        <button type="submit" class="reg-btn">
                           Зарегистрироваться
                        </button>
                        <a href="/login" class="log-a">Уже есть аккаунт?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
