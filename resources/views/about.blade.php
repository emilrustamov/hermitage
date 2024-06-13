@include('layouts.header', ['slider' => true])
<div class="container py-5 about-cont">
    <div class="w-100">
        <div class="left-div">
            <h2 class="fw-bold">О нас</h2>
            <p>HERMITAGE HOME INTERIORS - это компания премиум класса,
                которая позволяет почувствовать символ безупречного вкуса,
                синтез современных технологий с традиционными итальянским
                качеством, эксклюзивный современный дизайн и утонченный стиль,
                представляющий смесь различных культур и времен.
            <p>
        </div>
        <div class="right-div">
            <h2 class="fw-bold">Наша миссия и видение</h2>
            <p>Наша миссия состоит в том, чтобы повысить уровень комфорта
                в каждом доме, создавать и реализовывать самые амбициозные проекты,
                сочетающие функциональность и последние мировые тенденции
            <p>
            <p>Мы продолжаем использовать наш многолетний профессиональный
                опыт для создания комфорта, функциональности и атмосфер,
                которые полностью удовлетворяют требованиям наших клиентов.
            <p>
            <p>Это видение было основной нашей истории и культурной ценности дизайна,
                которая по-прежнему является главным ключом к нашим перспективам.
            <p>

        </div>
    </div>
    <div class="text-center fs-4 fw-bold fst-italic my-5">
        HERMITAGE HOME INTERIORS является официальным представителем
        ведущих европейских брендов в Туркменистане.
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid" src="{{ asset('/images/red-bath.jpg') }}">
            <p class="fs-4 fw-bold">
                Розничная продажа
            </p>
            <p>
                Компания представлена в 3 шоурумах по следующим направлениям:
            </p>
            <ul>
                <li>Сантехника, Плитка и камень, Напольные покрытия, Спа и Вейнес,
                    Строительные материалы.</li>
                <li>Мебель, Кухни и бытовая техника, Освещение, Система "Умный дом",
                    Декоративные материалы, Камины, Окна и Двери.</li>
                <li>Система отопления, вентиляции и кондиционирования.</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid" src="{{ asset('/images/bw-proj.jpg') }}">
            <p class="fs-4 fw-bold">
                Проекты
            </p>
            <p>
                Мы предлагаем полный спектр услуг: от разработки дизайна интерьера и экстерьера до поставки всех материалов и реализации проектов под ключ.
            </p>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid" src="{{ asset('/images/two-proj-men.png') }}">
            <p class="fs-4 fw-bold">
                Контракты
            </p>
            <p>
                Сотрудничая с международными и местными строительными компаниями, официальными дипломатическими представительствами, мы осуществляем поставку продукции по направлениям: гарантийное обслуживание и полную координацию проектов.
            </p>
        </div>
        <div class="col-lg-6 align-self-center d-flex flex-column text-center">
            <div>
                <div class="fs-3 fst-italic fw-bold">Самый выгодный поставщик:
                    все и в одном месте.</div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
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
    .right-div p{
        line-height: normal;

    }

    .left-div {
        text-align: left;

        margin-right: auto;
    }
    .left-div p{
        line-height: normal;
    }
</style>
