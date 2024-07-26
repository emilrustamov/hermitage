@php
    $banner = App\Models\Banner::where('page_identifier', 'about')->first();
@endphp

@include('layouts.header', [
    'slider' => false,
    'banner' => $banner ? $banner->banner : null,
])
<div class="container p-5 about-cont">
    <div class="left-div">
        <h2 class="fw-bold">О нас</h2>
    </div>
    <div class="w-50 mx-auto text-center p-twntw fw-bold my-5 scroll-fade-in">
        HERMITAGE HOME INTERIORS</br> является официальным партнёром </br>
        ведущих европейских брендов в Туркменистане.
    </div>
    <div class="w-100">
       
        <div class="">
            <h1 class="fw-bold mb-5 p-sxtn">Наша миссия и видение</h1>
            <p class="p-sxtn">Наша миссия состоит в том, чтобы повысить уровень комфорта в каждом доме, создавать и реализовывать самые
                амбициозные проекты,  сочетающие функциональность  и последние мировые тенденции.
            <p>
            <p class="p-sxtn">Мы продолжаем использовать наш многолетний профессиональный опыт для создания комфорта, функциональности
                и атмосферы, которые полностью удовлетворяют требованиям  наших клиентов.
            <p>
            <p class="p-sxtn">Это видение было основой нашей истории и культурной ценности дизайна, которая по-прежнему является главным ключом  к нашим перспективам.
            <p>

        </div>
    </div>
   
    <div class="row align-items-center">
        <div class="col-lg-6 scroll-fade-in mt-5">
            <div class="img-wrapper">
                <img class="img-fluid" src="{{ asset('/images/red-bath.jpg') }}">
            </div>
            
        </div>
        <div class="col-lg-6 align-self-center scroll-fade-in d-flex flex-column text-center">
            <div>
                <div class="p-twntw  fw-bold">Самый выгодный поставщик:
                </br> все и в одном месте.</div>
            </div>
        </div>
        <div class="col-lg-6 scroll-fade-in align-self-center ">
            <a class="p-twntw fw-bold" style="cursor: pointer">
                Розничная продажа
            </a>
            <p class="p-sxtn">
                Компания представлена в 3 шоурумах по следующим направлениям:
            </p>
            <ul >
                <li class="p-sxtn">Сантехника, Плитка и камень, Напольные покрытия, Спа и Вейнес,
                    Строительные материалы.</li>
                <li class="p-sxtn">Мебель, Кухни и бытовая техника, Освещение, Система "Умный дом",
                    Декоративные материалы, Камины, Окна и Двери.</li>
                <li class="p-sxtn">Система отопления, вентиляции и кондиционирования.</li>
            </ul>
        </div>
        <div class="col-lg-6 d-flex flex-column scroll-fade-in mt-3">
            <div class="img-wrapper">
                <img class="img-fluid " src="{{ asset('/images/two-proj-men.png') }}">
            </div>
            
        </div>
        <div class="col-lg-6 d-flex flex-column scroll-fade-in mt-5">
            <div class="img-wrapper">
                <img class="img-fluid" src="{{ asset('/images/bw-proj.jpg') }}">
            </div>
            <a class="p-twntw fw-bold mt-5" style="cursor: pointer">
                Проекты
            </a>
            <p class="p-sxtn">
                Мы предлагаем полный спектр услуг: от разработки дизайна интерьера и экстерьера до поставки всех
                материалов и реализации проектов под ключ.
            </p>
        </div>
        <div class="col-lg-6 align-self-start scroll-fade-in mt-5">
            <a class="p-twntw fw-bold" style="cursor: pointer">
                Контракты
            </a>
            <p class="p-sxtn">
                Сотрудничая с международными и местными строительными компаниями, официальными дипломатическими
                представительствами, мы осуществляем поставку продукции по направлениям: гарантийное обслуживание и
                полную координацию проектов.
            </p>
        </div>
        
        <div class="col-lg-12 text-center scroll-fade-in">
            <button class="download-btn">Скачать презентацию<i class="fa fa-download" aria-hidden="true"></i></button>
        </div>
    </div>
</div>

@include('layouts.footer')
<style>
    .right-div,
    .left-div {
        max-width: 50%;

    }

    .right-div {
        text-align: right;

        margin-left: auto;
    }

    .right-div p {
        line-height: normal;

    }

    .left-div {
        text-align: left;

        margin-right: auto;
    }

    .left-div p {
        line-height: normal;
    }
</style>
