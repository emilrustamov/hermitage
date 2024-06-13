@include('layouts.header', ['slider' => true])
<section style="background: white">
    <div class="row">
        <div class="col-lg-4  d-flex flex-column" style="padding-right:0">
            <div class="d-flex flex-column justify-content-around right-block" style="background-color: #202020;">
                <div class="d-flex flex-column left-info">
                    <h1 class="mb-1 mt-1 text-white align-self-center text-uppercase">Расчёт стоимости</h1>
                    <h3 class="mb-5 text-white align-self-center text-uppercase">Индвидидуального проекта</h3>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">Мы предоставляем удобный и интуитивно
                        понятный онлайн-калькулятор,
                        который позволит вам легко рассчитать стоимость проекта дома или дизайна интерьера на основе
                        ваших
                        индивидуальных параметров,
                        а также без необходимости личных встреч или переговоров.</div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-around" style="background-color: #fff;">
                <div class="d-flex flex-column">
                    <h1 class="mb-1 mt-1 text-white align-self-center text-uppercase">ㅤ</h1>
                    <h3 class="mb-5 text-white align-self-center text-uppercase">ㅤ</h3>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                </div>
                <div></div>
            </div>
        </div>
        <div class="col-lg-8" style="padding-left:0">
            <div class="radio-options">
                <div class="d-flex type-object">
                    <h6 class="text-uppercase radio-title fr">Выберите тип объекта</h6>
                    <div class="d-flex flex-column">
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type1" name="radio-group" type="radio">
                            <label for="type1" class="label-radio">Дом, квартира, апартаменты</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type2" name="radio-group" type="radio">
                            <label for="type2" class="label-radio">Офис, шоурум, салон</label>
                            <span class="radio-inner"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex type-job">
                    <h6 class="text-uppercase   radio-title">Выберите состав работы</h6>
                    <div class="d-flex flex-column">
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type3" name="radio-group1" type="radio">
                            <label for="type3" class="label-radio">Разработка эскизного проекта</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type4" name="radio-group1" type="radio">
                            <label for="type4" class="label-radio">Разработка архитектурного решения</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type5" name="radio-group1" type="radio">
                            <label for="type5" class="label-radio">Разработка генерального плана</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type6" name="radio-group1" type="radio">
                            <label for="type6" class="label-radio">Разработка дизайн-проекта интерьера</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type7" name="radio-group1" type="radio">
                            <label for="type7" class="label-radio">Разработка отдела КЖ</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type8" name="radio-group1" type="radio">
                            <label for="type8" class="label-radio">Разработка ВК и ОВК</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type9" name="radio-group1" type="radio">
                            <label for="type9" class="label-radio">Разработка ЭС</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type10" name="radio-group1" type="radio">
                            <label for="type10" class="label-radio">Разработка системы "Умный дом" на базе KNX
                            </label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type11" name="radio-group1" type="radio">
                            <label for="type11" class="label-radio">Разработка автоматизации</label>
                            <span class="radio-inner"></span>
                        </div>
                        <div class="radio-btn-wrap">
                            <input class="input-radio" id="type12" name="radio-group1" type="radio">
                            <label for="type12" class="label-radio">Авторский надзор</label>
                            <span class="radio-inner"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="d-flex justfy-content-center">
                    <h6 class="text-uppercase">Укажите площадь объекта</h6>
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <input type="text">
                            <p>м²</p>
                        </div>
                    <div class="contact-form d-flex flex-column">
                        <p class="text-uppercase">Ваши контактные данные</p>
                        <input type="text" placeholder="Страна, город*">
                        <input type="text" placeholder="Имя*">
                        <input type="text" placeholder="Телефон*">
                        <input type="email" placeholder="Email*">
                        <textarea name="" id="" cols="30" rows="6" placeholder="Сообщение"></textarea>
                        <div class="mt-2 mb-3 d-flex align-items-center  justify-content-start">
                            <input type="checkbox" class="my-auto checkbox-input" name="agreement">
                            <label for="agreement" class="agr-lab">Я согласен с правилами обработки обращений</label>
                        </div>
                        <button class="d-flex align-items-center justify-content-center">
                            <p class="m-auto">Отправить заявку</p>
                            <i class="fa fa-long-arrow-right"></i>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@include('layouts.footer')
