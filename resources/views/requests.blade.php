@php
    $banner = App\Models\Banner::where('page_identifier', 'projectcalc')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
<section style="background: white">
    <div class="row">
        <div class="col-lg-4 d-flex flex-column" style="padding-right: 0">
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
        </div>
        <div class="col-lg-8 radio-wrapper" style="padding-left: 0">
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
                    <form action="{{ route('requests.store', ['locale' => app()->getLocale()]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" id="projectType" value="Архитектурное проектирование">
                        <div class="radio-options">
                            <div class="d-flex type-job">
                                <h6 class="text-uppercase radio-title">Выберите состав работы</h6>
                                <div class="d-flex flex-column">
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type3" name="work_scope[]" value="Архитектурно-планировочная концепция" type="checkbox">
                                        <label for="type3" class="label-checkbox">Архитектурно-планировочная концепция</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type123" name="work_scope[]" value="Визуализация" type="checkbox">
                                        <label for="type123" class="label-checkbox">Визуализация</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type5" name="work_scope[]" value="Строительный проект (КЖ)" type="checkbox">
                                        <label for="type5" class="label-checkbox">Строительный проект (КЖ)</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type6" name="work_scope[]" value="Инженерные сети (ВК, ОВС, ЭС)" type="checkbox">
                                        <label for="type6" class="label-checkbox">Инженерные сети (ВК, ОВС, ЭС)</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type7" name="work_scope[]" value="Разработка системы 'Умный дом' на базе KNX" type="checkbox">
                                        <label for="type7" class="label-checkbox">Разработка системы 'Умный дом' на базе KNX</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type8" name="work_scope[]" value="Авторское сопровождение" type="checkbox">
                                        <label for="type8" class="label-checkbox">Авторское сопровождение</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="d-flex justfy-content-center">
                                <h6 class="text-uppercase">Укажите площадь объекта</h6>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="area" required>
                                        <p>м²</p>
                                    </div>
                                <div class="contact-form d-flex flex-column">
                                    <p class="text-uppercase">Ваши контактные данные</p>
                                    <input type="text" name="location" value="{{ auth()->check() ? auth()->user()->location : '' }}" placeholder="Страна, город*" required>
                                    <input type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" placeholder="Имя*" required>
                                    <input type="text" name="phone" value="{{ auth()->check() ? auth()->user()->contact : '' }}" placeholder="Телефон*" required>
                                    <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" placeholder="Email*" required>
                                    <textarea name="message" cols="30" rows="6" placeholder="Сообщение"></textarea>
                                    <div class="mt-2 mb-3 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" class="my-auto checkbox-input" name="agreement" required>
                                        <label for="agreement" class="agr-lab">Я согласен с правилами обработки обращений</label>
                                    </div>
                                    <button type="submit" class="d-flex align-items-center justify-content-center">
                                        <p class="m-auto">Отправить заявку</p>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tab2" class="tab-pane">
                    <form action="{{route('requests.store', ['locale' => app()->getLocale()]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" id="projectType" value="Дизайн интерьера">
                        <div class="radio-options">
                            <div class="d-flex type-job" style="margin-bottom: 50px">
                                <h6 class="text-uppercase radio-title" style="margin-right: 80px;">Выберите тип объекта</h6>
                                <div class="d-flex flex-column">
                                    <div class="radio-btn-wrap">
                                        <input class="input-radio" id="type3" name="radio-group" value="Частный проект (дом, квартира, апартаменты)" type="radio" checked>
                                        <label for="type3" class="label-radio">Частный проект (дом, квартира, апартаменты)</label>
                                        <span class="radio-inner"></span>
                                    </div>
                                    <div class="radio-btn-wrap">
                                        <input class="input-radio" id="type4" name="radio-group" value="Коммерческий проект(офис, шоурум, салон)" type="radio">
                                        <label for="type4" class="label-radio">Коммерческий проект (офис, шоурум, салон)</label>
                                        <span class="radio-inner"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex type-job">
                                <h6 class="text-uppercase radio-title">Выберите состав работы</h6>
                                <div class="d-flex flex-column">
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type3_2" name="work_scope[]" value="Архитектурно-планировочная концепция" type="checkbox">
                                        <label for="type3_2" class="label-checkbox">Архитектурно-планировочная концепция</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type123_2" name="work_scope[]" value="Визуализация" type="checkbox">
                                        <label for="type123_2" class="label-checkbox">Визуализация</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type5_2" name="work_scope[]" value="Строительный проект (КЖ)" type="checkbox">
                                        <label for="type5_2" class="label-checkbox">Строительный проект (КЖ)</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type6_2" name="work_scope[]" value="Инженерные сети (ВК, ОВС, ЭС)" type="checkbox">
                                        <label for="type6_2" class="label-checkbox">Инженерные сети (ВК, ОВС, ЭС)</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type7_2" name="work_scope[]" value="Разработка системы 'Умный дом' на базе KNX" type="checkbox">
                                        <label for="type7_2" class="label-checkbox">Разработка системы 'Умный дом' на базе KNX</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                    <div class="checkbox-btn-wrap">
                                        <input class="input-checkbox" id="type8_2" name="work_scope[]" value="Авторское сопровождение" type="checkbox">
                                        <label for="type8_2" class="label-checkbox">Авторское сопровождение</label>
                                        <span class="checkbox-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="d-flex justfy-content-center">
                                <h6 class="text-uppercase">Укажите площадь объекта</h6>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="area" required>
                                        <p>м²</p>
                                    </div>
                                <div class="contact-form d-flex flex-column">
                                    <p class="text-uppercase">Ваши контактные данные</p>
                                    <input type="text" name="location" value="{{ auth()->check() ? auth()->user()->location : '' }}" placeholder="Страна, город*" required>
                                    <input type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" placeholder="Имя*" required>
                                    <input type="text" name="phone" value="{{ auth()->check() ? auth()->user()->phone : '' }}" placeholder="Телефон*" required>
                                    <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" placeholder="Email*" required>
                                    <textarea name="message" cols="30" rows="6" placeholder="Сообщение"></textarea>
                                    <div class="mt-2 mb-3 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" class="my-auto checkbox-input" name="agreement" required>
                                        <label for="agreement" class="agr-lab">Я согласен с правилами обработки обращений</label>
                                    </div>
                                    <button type="submit" class="d-flex align-items-center justify-content-center">
                                        <p class="m-auto">Отправить заявку</p>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@vite(['resources/js/tabpane.js'])

