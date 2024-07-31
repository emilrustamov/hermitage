@php
    $banner = App\Models\Banner::where('page_identifier', 'projectcalc')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
<section style="background: white">
    <div class="row">
        <div class="col-lg-4  d-flex flex-column" style="padding-right:0">
            <div class="d-flex flex-column justify-content-around right-block" style="background-color: #202020;">
                <div class="d-flex flex-column left-info">
                    <h1 class="mb-1 mt-1 text-white align-self-center text-uppercase">{{ __('translation.calc_h1')}}</h1>
                    <h3 class="mb-5 text-white align-self-center text-uppercase">{{ __('translation.calc_h2')}}</h3>
                    <div class="mt-5 text-white fs-5 text-start align-self-center">{{ __('translation.calc_h3')}}</div>
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
                        <p>{{ __('translation.calc_p1')}}</p>
                        <p class="fw-bold">{{ __('translation.calc_p2')}}</p>
                    </div>
                    <div class="d-none flex-column design-proj " id="designProj">
                        <p>дизайн</p>
                        <p class="fw-bold">{{ __('translation.calc_p3')}}</p>
                        <p class="fw-bold">{{ __('translation.calc_p4')}}</p>
                    </div>
                    <div class="tabs d-flex flex-column">
                        <div class="tab active" data-tab="tab1">{{ __('translation.calc_price1')}}</div>
                        <div class="tab" data-tab="tab2">{{ __('translation.calc_price2')}}</div>
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
                            <h6 class="text-uppercase   radio-title">{{ __('translation.calc_choosework1')}}</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group112312" type="radio" checked>
                                    <label for="type3" class="label-radio">{{ __('translation.calc_label1')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type123" name="radio-group2123323" type="radio" checked>
                                    <label for="type123" class="label-radio">{{ __('translation.calc_label2')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type5" name="radio-group3" type="radio">
                                    <label for="type5" class="label-radio">{{ __('translation.calc_label3')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type6" name="radio-group4" type="radio">
                                    <label for="type6" class="label-radio">{{ __('translation.calc_label4')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type7" name="radio-group5" type="radio">
                                    <label for="type7" class="label-radio">{{ __('translation.calc_label5')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">{{ __('translation.calc_label6')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="d-flex justfy-content-center">
                            <h6 class="text-uppercase">{{ __('translation.calc_choose_object')}}</h6>
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <input type="text">
                                    <p>{{ __('translation.calc_disquared')}}</p>
                                </div>
                            <div class="contact-form d-flex flex-column">
                                <p class="text-uppercase">{{ __('translation.calc_object_1')}}</p>
                                <input type="text" placeholder="Страна, город*">
                                <input type="text" placeholder="Имя*">
                                <input type="text" placeholder="Телефон*">
                                <input type="email" placeholder="Email*">
                                <textarea name="" id="" cols="30" rows="6" placeholder="Сообщение"></textarea>
                                <div class="mt-2 mb-3 d-flex align-items-center  justify-content-start">
                                    <input type="checkbox" class="my-auto checkbox-input" name="agreement">
                                    <label for="agreement" class="agr-lab">{{ __('translation.calc_agree')}}</label>
                                </div>
                                <button class="d-flex align-items-center justify-content-center">
                                    <p class="m-auto">{{ __('translation.calc_sendbtn')}}</p>
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
                            <h6 class="text-uppercase   radio-title" style="margin-right:80px; ">{{ __('translation.calc_choose_type')}}</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group123123" type="radio" checked>
                                    <label for="type3" class="label-radio">{{ __('translation.calc_label7')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type4" name="radio-group1231231" type="radio">
                                    <label for="type4" class="label-radio">{{ __('translation.calc_label8')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex type-job">
                            <h6 class="text-uppercase   radio-title">{{ __('translation.calc_label9')}}</h6>
                            <div class="d-flex flex-column">
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type3" name="radio-group1" type="radio" checked>
                                    <label for="type3" class="label-radio">{{ __('translation.calc_label10')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type123" name="radio-group2" type="radio" checked>
                                    <label for="type123" class="label-radio">{{ __('translation.calc_label11')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type5" name="radio-group3" type="radio">
                                    <label for="type5" class="label-radio">{{ __('translation.calc_label12')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type6" name="radio-group4" type="radio">
                                    <label for="type6" class="label-radio">{{ __('translation.calc_label13')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type7" name="radio-group5" type="radio">
                                    <label for="type7" class="label-radio">{{ __('translation.calc_label14')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">{{ __('translation.calc_label15')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">{{ __('translation.calc_label16')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">{{ __('translation.calc_label17')}}</label>
                                    <span class="radio-inner"></span>
                                </div>
                                <div class="radio-btn-wrap">
                                    <input class="input-radio" id="type8" name="radio-group6" type="radio">
                                    <label for="type8" class="label-radio">{{ __('translation.calc_label18')}}</label>
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
