<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProjectCalcController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminSubscriberController;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Auth;


//header links
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite');
Route::get('/register',[RegisterController::class, 'index'])->name('register')->middleware('guest');

//proj
Route::get('/projectcalc',[ProjectCalcController::class, 'index'])->name('projectcalc');


// Маршрут для смены языка
Route::get('change-locale/{locale}', function ($locale) {
    $availableLocales = Config::get('app.available_locales');
    if (in_array($locale, $availableLocales)) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('change_locale');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});


Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/vacancies', [VacancyController::class, 'index'])->name('admin.vacancies.index');
    Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('admin.vacancies.create');
    Route::post('/vacancies', [VacancyController::class, 'store'])->name('admin.vacancies.store');
    Route::get('/vacancies/{id}/edit', [VacancyController::class, 'edit'])->name('admin.vacancies.edit');
    Route::put('/vacancies/{id}', [VacancyController::class, 'update'])->name('admin.vacancies.update');
    Route::delete('/vacancies/{id}', [VacancyController::class, 'destroy'])->name('admin.vacancies.destroy');
    Route::get('/', function () {
        return view('admin.admin');
    })->name('admin');

    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
});


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('/', function () {
    return redirect('/ru');
});

Route::group(['prefix' => '{locale}', 'middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/vacancies', [VacancyController::class, 'publicIndex'])->name('vacancies.index');
    Route::get('/vacancies/{id}', [VacancyController::class, 'publicShow'])->name('vacancies.show');
    Route::get('/blogs', [BlogController::class, 'publicIndex'])->name('blogs.index');
    Route::get('/blogs/{id}', [BlogController::class, 'publicShow'])->name('blogs.show');
});


// Route::get('/', [SubscriberController::class, 'subscriber_form'])->name('form');
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');

// Message to All Subscriber

Route::get('/subscriber/all', [AdminSubscriberController::class, 'show_all'])->name('admin_subscribers');
Route::get('/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::post('/admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('subscriber_send_email_submit');
