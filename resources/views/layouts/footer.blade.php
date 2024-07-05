<div class="row px-5 py-5" style="background-color: white">
    <div class="col-lg-3  align-self-center d-flex flex-column">
        <h2 class="heading">Подпсиывайтесь на нашу новостную рассылку</h2>
    </div>
    <div class="col-lg-3  align-self-center d-flex flex-column">
        Будьте первым, кто узнает о специальных предложениях и событиях
        </p>
    </div>
    <div class="col-lg-6  align-self-center d-flex flex-column">
        <form action="{{ route('subscribe') }}" method="post" class="row">
            @csrf

            <div class="form-group mb-3 col-lg-9 col-6  align-self-center d-flex flex-column">
                <input type="text" name="email" class="form-control" placeholder="Email Address">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-lg-3 col-6 ">
                <button type="submit" class="btn cstmbtn">Подтвердить</button>
            </div>
        </form>
    </div>
</div>
</main>
<footer class="container">
    <div class="row">
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">О нас</p>
            <ul class="unstyle p-0">
                <li> О нас</li>
                <li> <a href="{{ route('areas', ['locale' => app()->getLocale()]) }}">Направления</a></li>
                <li> Партнеры</li>
                <li> Контракты</li>
                <li> Проекты</li>
                <li> Сертификаты</li>
                <li> Новости</li>
                <li> Вакансии</li>
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">Товары</p>
            <ul class="unstyle p-0">
                <li> В наличии
                <li> Новые поступления
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">Заказать проект</p>
            <ul class="unstyle p-0">
                <li> Расчет стоимости индивидуального проекта
                <li> 3D модели
            </ul>
        </div>
        <div class="col-lg-3 col-6 py-3">
            <p class="ul-title">Контакты</p>
            <div class="footer-address">Ул. С. Сейди, 27<br>
                Торговый центр "DÜRDÄNELI", 1 этаж<br>
                шоурум HERMITAGE HOME INTERIORS<br>
                <a>+99365 56-41-59</a><br>
                <a>+99365 41-59-02</a>
            </div><br>
            <div class="footer-address">Ул. С. Сейди, 27<br>
                Торговый центр "DÜRDÄNELI", 1 этаж<br>
                шоурум HERMITAGE HOME INTERIORS<br>
                <a>+99365 56-41-59</a><br>
                <a>+99365 41-59-02</a>
            </div>
        </div>

        <div class="col-lg-6 col-6  py-3">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin-in"></i>


        </div>
        <div class="col-lg-6 col-6 text-end  py-3">

            <img src="{{ asset('/images/logo.svg') }}" alt ="logo" style="width: 200px">

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/DrawSVGPlugin.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/GSDevTools.min.js"></script>
</footer>
</div>
</body>
<html>
