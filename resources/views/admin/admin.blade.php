@include('layouts.headerA', ['hasimage' => true])

<div class="bg-white admin-img">
    <img src="{{ asset('/images/main3.jpg') }}" alt="">
    <div class="text-container">
        <p>Приветствую Вас, user!</p>
        <p>Добро пожаловать на админ-панель сайта Hermitage</p>
    </div>
</div>

@include('layouts.footerA')
