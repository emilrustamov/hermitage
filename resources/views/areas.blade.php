@include('layouts.header', ['slider' => true])
<style>
    .container{
        max-width: 1600px !important;
    }
    .furniture-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .furniture-description {
        text-align: center;
        font-size: 18px;
        margin-bottom: 40px;
    }

    .wardrobe-image {
        width: 100%;
        height: auto;
    }

    .chair-image-container {
        position: relative;
        /* height: 100%; */
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }

    .chair-image {
        width: 100%;
        height: 300px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        object-fit: cover;
    }

    .chandeleir-image {
        width: 95%;
        height: 290px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }

    .vase-image {
        width: 100%;
        height: 85%;
        object-fit: cover;
    }

    .door {
        margin-top: 320px;
    }


    .btn-image-container {
        position: relative;
        /* height: 100%; */
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }

    .btn-image {
        width: 95%;
        height: 350px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }

    .tile {
        margin-top: 300px;
        height: 300px
    }

    .doors {
        width: 50%;
    }

    @media screen and (max-width:1024px) and (min-width:768px) {
        .chair-image {
            width: 100%;
            height: auto;
        }

        .door {
            margin-top: 320px;
        }

        .tile {
            margin-top: 255px;
            height: 200px
        }

        .btn-image {
            width: 100%;
            height: 240px;
        }

        .chandeleir-image {
            width: 95%;
            margin-top: 160px;
        }

        .plate {
            height: 190px;
            margin-top: 210px;
        }

        .container {
            max-width: none !important;
        }
    }


    @media screen and (max-width:768px) and (min-width:425px) {
        .chair-image {
            margin-top: 20px;
            height: auto;

        }

        .chandeleir-image {
            object-fit: cover;
            height: 91%;
            padding: 10px;
            margin-top: 0;
            width: 100%;
        }

        .container {
            max-width: none !important;
        }

        .vase-image {
            width: 100%;
            /* height: 100%; */
        }

        p {
            text-align: center !important;
            float: none !important;
            margin: 0 !important;
        }

        .title {
            font-weight: bold;
        }

        .btn-image {
            width: 100%;
            height: auto;
            margin-top: 20px;
        }


        .doors {
            width: 49% !important;
        }

    }

    @media screen and (max-width:425px) and (min-width:320px) {
        .chair-image {
            width: 100%;
            height: auto;
            margin-top: 20px;
            object-fit: cover;
        }

        .chandeleir-image {
            object-fit: cover;
            height: 91%;
            padding: 10px;
            margin-top: 0;
            width: 100%;
        }

        p {
            text-align: center !important;
            float: none !important;
            margin: 0 !important;
        }

        .title {
            font-weight: bold;
        }

        .container {
            max-width: none !important;
        }

        .vase-image {
            width: 100%;
            /* height: 100%; */
        }

        .btn-image {
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .doors {
            width: 49% !important;
        }

    }
</style>
<div class="container mt-5 scroll-fade-in">
    <p class="title">Мебель</p>
    <p style="float: right;">Итальянская мебель отличается особой элегантностью и надежным качеством!</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/1.jpg') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/2.jpg') }}" alt="Кресло с столом" class="chair-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">ОСВЕЩЕНИЕ</p><br>
    <p>Создайте освещение, подходящее для вашего пространства с помощью продуманных решений!</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/3.jpg') }}" alt="Шкаф" class="chair-image">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/4.jpg') }}" alt="Кресло с столом" class="vase-image">
        </div>
    </div>
</div>

<div class="container mt-5 scroll-fade-in">
    <p class="title">СИСТЕМА «УМНЫЙ ДОМ»</p>
    <p style="text-align: right; align-self: self-end;">Улучшите качество своей жизни, настроив гибкую <br>
        систему «Умный дом» в соответствии с собственным потребностями.</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/5.png') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 btn-image-container">
            <img src="{{ asset('/images/photos/6.jpg') }}" alt="Кресло с столом" class="btn-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">Кухни бытовая техника</p><br>
    <p>Широкий выбор, эксклюзивный и современный дизайн <br> инновационных технологий</p>
    <div class="row" style="margin-top: 35px;">
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/7.jpg') }}" alt="Шкаф" class="chair-image plate">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/8.jpg') }}" alt="Кресло с столом" class="vase-image">
        </div>
    </div>
</div>
<div class="container scroll-fade-in" style="padding-top: 35px;">
    <p class="title">ДЕКОРОТИВНЫЕ МАТЕРИАЛЫ</p>
    <p style="text-align: right; align-self: self-end;">Декор-это исскуство и функциональность, которые
        <br>ассоцируются с современностью!
    </p>
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/9.jpg') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/10.jpg') }}" alt="Кресло с столом" class="chair-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">КАМИНЫ</p><br>
    <p>Встраиваемые камины и электрокамины наполнят <br>ваш дом теплом и уютом!</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-5 ">
            <img src="{{ asset('/images/photos/3.jpg') }}" alt="Шкаф" class="chandeleir-image">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/4.jpg') }}" alt="Кресло с столом" class="vase-image">
        </div>
    </div>
</div>

<div class="container mt-5 scroll-fade-in">
    <p class="title">НАПОЛНЫЕ ПОКРЫТИЯ</p>
    <p style="text-align: right; align-self: self-end;">Качественные наполные покрытия из дерева,расскрывают
        характер натуральной древесины <br>во всем ее многообразии.</p>
    <div class="row" style="margin-top: 45px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/13.jpg') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/14.jpg') }}" alt="Кресло с столом" class="chair-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">САНТЕХНИКА</p><br>
    <p>Ванная комната то с чего начинается ваш день.</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-5 ">
            <img src="{{ asset('/images/photos/15.jpg') }}" alt="Шкаф" class="chandeleir-image">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/16.jpg') }}" alt="Кресло с столом" class="vase-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p class="title ">ПЛИТКА КАМЕНЬ</p>
    <p style="text-align: right; align-self: self-end;">Уникальная цветовая гармония натуральные
        материалы<br>всегда
        близки к природе.</p>
    <div class="row" style="margin-top: 35px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/17.jpg') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/18.jpg') }}" alt="Кресло с столом" class="chair-image tile">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">СПА И ВЕЛНЕС</p><br>
    <p>Революционная предложение для <br> СПА-процедурь и полноценного релакса</p>
    <div class="row" style="margin-top: 65px;">
        <div class="col-md-5 ">
            <img src="{{ asset('/images/photos/19.jpg') }}" alt="Шкаф" class="chandeleir-image">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/20.jpg') }}" alt="Кресло с столом" class="vase-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p class="title">ОТОПЛЕНИЕ,ВЕНТИЛЯЦИЯ И КОНДИЦИОНИРОВАНИЕ</p>
    <p style="text-align: right; align-self: self-end;">Самые инновационные системы отопления, вентиляции и
        кондиционирование<br>для вашего здорового климата.</p>
    <div class="row" style="margin-top: 35px;">
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/21.jpg') }}" alt="Шкаф" class="wardrobe-image">
        </div>
        <div class="col-md-5 chair-image-container">
            <img src="{{ asset('/images/photos/22.jpg') }}" alt="Кресло с столом" class="chair-image">
        </div>
    </div>
</div>
<div class="container mt-5 scroll-fade-in">
    <p style="float: right;" class="title">ОКНА И ДВЕРИ </p><br>
    <p>Это мастерская играформ и материалов, которые<br> сливаются воедино и приоткрывают занавес будущего мира
        дверей и окон.</p>
    <div class="row" style="margin-top: 35px;">
        <div class="col-md-5">
            <img src="{{ asset('/images/photos/23.jpg') }}" alt="Шкаф" class="chandeleir-image door ">
        </div>
        <div class="col-md-7">
            <img src="{{ asset('/images/photos/24.jpg') }}" alt="Кресло с столом" class="vase-image doors"
                style="width: 50%; ">
            <img src="{{ asset('/images/photos/25.jpg') }}" alt="Кресло с столом" class="vase-image doors"
                style="width: 49%; ">
        </div>
    </div>
    <div class="container mt-5 scroll-fade-in" style="margin-top: 10px !important;">
        <p style="text-align: right; align-self: self-end; margin-bottom: 0;" class="title">СТРОИТЕЛБНЫЕ МАТЕРИАЛЫ
        </p><br>
        <p style="margin-bottom:0;">Решения, которые соответствуют индивидуальным требованиям <br>проектов и
            могут применяться на различных типах объектов</p>
        <div class="row" style="margin-top: 35px;">
            <div class="col-md-5 ">
                <img src="{{ asset('/images/photos/15.jpg') }}" alt="Шкаф" class="chandeleir-image">
            </div>
            <div class="col-md-7">
                <img src="{{ asset('/images/photos/16.jpg') }}" alt="Кресло с столом" class="vase-image">
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
