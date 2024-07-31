<div class="row align-items-center px-5 py-5" style="background-color: white">
    <div class="col-lg-4  align-self-center d-flex flex-column">
        <h2 class="heading">Подписывайтесь на нашу новостную рассылку</h2>
    </div>
    <div class="col-lg-4  mt-2 align-self-center d-flex flex-column">
        Будьте первым, кто узнает о специальных предложениях, новых продуктах и событиях
        </p>
    </div>
    <div class="col-lg-4  align-self-center d-flex flex-column">
        <form action="{{ route('subscribe', ['locale' => app()->getLocale()]) }}" method="post" class="row">
            @csrf
            <div class="form-group col-lg-9 col-6  align-self-center d-flex flex-column">
                <input type="text" name="email" class="form-control subscr-input" placeholder="Электронная почта">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-lg-3 col-6 text-end">
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
                <li><a class="footer-link" href="{{ route('about', ['locale' => app()->getLocale()]) }}"> О нас</a></li>
                <li><a class="footer-link" href="{{ route('areas', ['locale' => app()->getLocale()]) }}">Направления</a></li>
                <li><a class="footer-link" href="{{ route('partners.index', ['locale' => app()->getLocale()]) }}"> Партнеры</a></li>
                <li><a class="footer-link" href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}"> Контракты</a></li>
                <li><a class="footer-link" href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}"> Проекты</a></li>
                <li><a class="footer-link" href="{{ route('certificates.index', ['locale' => app()->getLocale()]) }}"> Сертификаты</a></li>
                <li><a class="footer-link" href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}"> Новости</a></li>
                <li><a class="footer-link" href="{{ route('vacancies.index', ['locale' => app()->getLocale()]) }}"> Вакансии</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">Товары</p>
            <ul class="unstyle p-0">
               <li><a class="footer-link" href="{{ route('products.index', ['locale' => app()->getLocale()]) }}"> В наличии</a> </li>
                <li><a class="footer-link" href="{{ route('productsnew.index', ['locale' => app()->getLocale()]) }}"> Новые поступления </a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">Заказать проект</p>
            <ul class="unstyle p-0">
                <li> <a class="footer-link" href="{{ route('requests.index', ['locale' => app()->getLocale()]) }}">Расчет стоимости индивидуального проекта </a>
                <li> <a class="footer-link" href="{{ route('models.public.index', ['locale' => app()->getLocale()]) }}">3D модели</a>
            </ul>
        </div>
        <div class="col-lg-3 col-6 py-3">
            <p class="ul-title">Контакты</p>
            <div class="footer-address">Ул. С. Сейди, 27<br>
                Торговый центр "DÜRDÄNELI", 1 этаж<br>
                шоурум HERMITAGE HOME INTERIORS<br>
                <a class="footer-link">+99365 56-41-59</a><br>
                <a class="footer-link">+99365 41-59-02</a>
            </div><br>
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
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/DrawSVGPlugin.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/GSDevTools.min.js"></script> --}}
</footer>
</div>
</body>
<html>
