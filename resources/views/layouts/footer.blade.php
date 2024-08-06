
<div class="row px-5 py-5" style="background-color: white">
    <div class="col-lg-3  align-self-center d-flex flex-column">
        <h2 class="heading">{{ __('translation.foot')}}</h2>
    </div>
    <div class="col-lg-4  mt-2 align-self-center d-flex flex-column">
        {{ __('translation.foot_p1')}}
    </div>
    <div class="col-lg-4  align-self-center d-flex flex-column">
        <form action="{{ route('subscribe', ['locale' => app()->getLocale()]) }}" method="post" class="row">
            @csrf
            <div class="form-group mb-3 col-lg-9 col-6  align-self-center d-flex flex-column">
                <input type="text" name="email" class="form-control" placeholder="{{ __('translation.mail')}}">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-lg-3 col-6 text-end">
                <button type="submit" class="btn cstmbtn">{{ __('translation.foot_btn')}}</button>
            </div>
        </form>
    </div>
</div>
</main>
<footer class="container">
    <div class="row">
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">{{ __('translation.head_li1')}}</p>
            <ul class="unstyle p-0">
                <li><a class="footer-link" href="{{ route('about', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li1')}}</a></li>
                <li><a class="footer-link" href="{{ route('areas', ['locale' => app()->getLocale()]) }}">{{ __('translation.head_li2')}}</a></li>
                <li><a class="footer-link" href="{{ route('partners.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li3')}}</a></li>
                <li><a class="footer-link" href="{{ route('contracts.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li4')}}</a></li>
                <li><a class="footer-link" href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li5')}}</a></li>
                <li><a class="footer-link" href="{{ route('certificates.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li10')}}</a></li>
                <li><a class="footer-link" href="{{ route('blogs.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li7')}}</a></li>
                <li><a class="footer-link" href="{{ route('vacancies.index', ['locale' => app()->getLocale()]) }}"> {{ __('translation.head_li8')}}</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">{{ __('translation.foot_prod')}}</p>
            <ul class="unstyle p-0">
               <li><a class="footer-link" href="{{ route('products.index', ['locale' => app()->getLocale()]) }}"> В наличии</a> </li>
                <li><a class="footer-link" href="{{ route('productsnew.index', ['locale' => app()->getLocale()]) }}"> Новые поступления </a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-6  py-3">
            <p class="ul-title">{{ __('translation.head_li9')}}</p>
            <ul class="unstyle p-0">
                <li> <a class="footer-link" href="{{ route('requests.index', ['locale' => app()->getLocale()]) }}">{{ __('translation.foot_li3')}} </a>
                <li> <a class="footer-link" href="{{ route('models.public.index', ['locale' => app()->getLocale()]) }}">{{ __('translation.head_li4')}}</a>
            </ul>
        </div>
        <div class="col-lg-3 col-6 py-3">
            <p class="ul-title">{{ __('translation.foot_contact')}}</p>
            <div class="footer-address"> {!! nl2br(e(__('translation.foot_location'))) !!}
                <a>+99365 56-41-59</a><br>
                <a>+99365 41-59-02</a>
            </div>
        </div>

        <div class="col-lg-6 col-6  py-3">
            <div class="col-lg-2 d-flex justify-content-between">
                <div class="icon-wrapper">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="icon-wrapper">
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="icon-wrapper">
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>


        </div>
        <div class="col-lg-6 col-6 text-end  py-3">

            <img src="{{ asset('/images/logo.svg') }}" alt ="logo" style="width: 200px">

        </div>
    </div>
    <button id="scrollToTopButton" class="scroll-to-top"><i class="fa fa-chevron-up"></i></button>

</footer>
</div>
<script src="{{ asset('/js/jquery.js') }}"></script>

</body>
<html>
