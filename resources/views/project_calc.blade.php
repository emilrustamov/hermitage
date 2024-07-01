@php
    $banner = App\Models\Banner::where('page_identifier', 'projectcalc')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
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
            {{-- <div class="d-flex flex-column justify-content-around" style="background-color: #fff;">
                <div class="d-flex flex-column">
                    <h1 class="mb-1 mt-1 text-white align-self-center text-uppercase">ㅤ</h1>
                    <h3 class="mb-5 text-white align-self-center text-uppercase">ㅤ</h3>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">ㅤ</div>
                </div>
                <div></div>
            </div> --}}
        </div>
        <div class="col-lg-8 radio-wrapper" style="padding-left:0">
            <div class="tabs-wrapper">
                <div class="d-flex">
                    <div class="d-flex flex-column arc-proj " id="architectureProj">
                        <p>Архитектурное</p>
                        <p class="fw-bold">проектирование</p>
                    </div>
                    <div class="d-none flex-column design-proj " id="designProj">
                        <p>дизайн</p>
                        <p class="fw-bold">внутренних</p>
                        <p class="fw-bold">пространств</p>
                    </div>
                    <div class="tabs d-flex flex-column">
                        <div class="tab active" data-tab="tab1">Стоимость архитектурного проекта</div>
                        <div class="tab" data-tab="tab2">Стоимость дизайна интерьера</div>
                    </div>
                </div>
                <div id="tab1" class="tab-pane active">
                    <div class="radio-options">
                        {{-- <div class="d-flex type-object">
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
                        </div> --}}
                        <div class="d-flex type-job">
                            <h6 class="text-uppercase   radio-title">Выберите состав работы</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group112312" type="radio" checked>
                                    <label for="type3" class="label-radio">Архитектурно-планировочная концепция</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type123" name="radio-group2123323" type="radio" checked>
                                    <label for="type123" class="label-radio">Визуализация</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type5" name="radio-group3" type="radio">
                                    <label for="type5" class="label-radio">Строительный проект (КЖ)</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type6" name="radio-group4" type="radio">
                                    <label for="type6" class="label-radio">Инженерные сети (ВК, ОВС, ЭС)</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type7" name="radio-group5" type="radio">
                                    <label for="type7" class="label-radio">Разработка системы "Умный дом" на базе KNX</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">Авторское сопровождение</label>
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
                <div id="tab2" class="tab-pane">
                    <div class="radio-options">                        
                        <div class="d-flex type-job" style="margin-bottom: 50px">
                            <h6 class="text-uppercase   radio-title" style="margin-right:80px; ">Выберите тип объекта</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group123123" type="radio" checked>
                                    <label for="type3" class="label-radio">Частный проект (дом, квартира, апартаменты)</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type4" name="radio-group1231231" type="radio">
                                    <label for="type4" class="label-radio">Коммерческий проект(офис, шоурум, салон)</label>
                                    <span class="radio-inner"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex type-job">
                            <h6 class="text-uppercase   radio-title">Выберите состав работы</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group1" type="radio" checked>
                                    <label for="type3" class="label-radio">Сбор общих данных</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type123" name="radio-group2" type="radio" checked>
                                    <label for="type123" class="label-radio">Планировочное решение</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type5" name="radio-group3" type="radio">
                                    <label for="type5" class="label-radio">Концептуальное решение</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type6" name="radio-group4" type="radio">
                                    <label for="type6" class="label-radio">Фотореалистичная визуализация</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type7" name="radio-group5" type="radio">
                                    <label for="type7" class="label-radio">Техническая документация</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">Сметная стоимость</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">Комплектация</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">Разработка умного дома на базе KNX</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">Авторское сопровождение</label>
                                    <span class="radio-inner"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
          
        </div>
</section>
@include('layouts.footer')
