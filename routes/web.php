<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProjectCalcController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminSubscriberController;
use App\Http\Controllers\PartnerController;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ModelsController;

Route::get('/', function () {
    return redirect('/ru');
});

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

Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {
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

    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::get('/partners/categories', [PartnerController::class, 'indexCategory'])->name('admin.partners.categories.index');
    Route::get('/partners/categories/create', [PartnerController::class, 'createCategory'])->name('admin.partners.categories.create');
    Route::post('/partners/categories', [PartnerController::class, 'storeCategory'])->name('admin.partners.categories.store');
    Route::get('/partners/categories/{id}/edit', [PartnerController::class, 'editCategory'])->name('admin.partners.categories.edit');
    Route::put('/partners/categories/{id}', [PartnerController::class, 'updateCategory'])->name('admin.partners.categories.update');
    Route::delete('/partners/categories/{id}', [PartnerController::class, 'destroyCategory'])->name('admin.partners.categories.destroy');

    Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partners.index');
    Route::get('/partners/create', [PartnerController::class, 'createPartner'])->name('admin.partners.create');
    Route::post('/partners', [PartnerController::class, 'storePartner'])->name('admin.partners.store');
    Route::get('/partners/{id}/edit', [PartnerController::class, 'editPartner'])->name('admin.partners.edit');
    Route::put('/partners/{id}', [PartnerController::class, 'updatePartner'])->name('admin.partners.update');
    Route::delete('/partners/{id}', [PartnerController::class, 'destroyPartner'])->name('admin.partners.destroy');

    Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('admin.banners.update');

    Route::get('/certificates', [CertificatesController::class, 'index'])->name('admin.certificates.index');
    Route::get('/certificates/create', [CertificatesController::class, 'create'])->name('admin.certificates.create');
    Route::post('/certificates', [CertificatesController::class, 'store'])->name('admin.certificates.store');
    Route::delete('/certificates/{id}', [CertificatesController::class, 'destroy'])->name('admin.certificates.destroy');
    Route::get('/certificates/{id}/edit', [CertificatesController::class, 'edit'])->name('admin.certificates.edit');
    Route::put('/certificates/{id}', [CertificatesController::class, 'update'])->name('admin.certificates.update');

    Route::get('/models', [ModelsController::class, 'index'])->name('admin.models.index');
    Route::get('/models/create', [CertificatesController::class, 'create'])->name('admin.models.create');
    Route::post('/models', [CertificatesController::class, 'store'])->name('admin.models.store');
    Route::delete('/models/{id}', [CertificatesController::class, 'destroy'])->name('admin.models.destroy');
    Route::get('/models/{id}/edit', [CertificatesController::class, 'edit'])->name('admin.models.edit');
    Route::put('/models/{id}', [CertificatesController::class, 'update'])->name('admin.models.update');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');



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
    Route::get('/projects', [ProjectController::class, 'publicIndex'])->name('projects.index');
    Route::get('/projects/{id}', [ProjectController::class, 'publicShow'])->name('projects.show');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::get('/projectcalc', [ProjectCalcController::class, 'index'])->name('projectcalc');
    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/certificates', [CertificatesController::class, 'publicIndex'])->name('certificates.index');
    Route::get('/partners', [PartnerController::class, 'showPartners'])->name('partners.index');
});

// Route::get('/', [SubscriberController::class, 'subscriber_form'])->name('form');
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');

// Message to All Subscribers
Route::get('/subscriber/all', [AdminSubscriberController::class, 'show_all'])->name('admin_subscribers');
Route::get('/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::post('/admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('subscriber_send_email_submit');
