<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\ProjectGalleryPageController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\ServiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'index')->name('home_page');
});
Route::controller(AboutPageController::class)->group(function () {
    Route::get('/about-ksa', 'index')->name('about_page');
});
Route::controller(ProjectGalleryPageController::class)->group(function () {
    Route::get('/project-gallery', 'index')->name('project_gallery_page');
});

Route::controller(ContactPageController::class)->group(function () {
    Route::get('/contact-us', 'index')->name('contact_page');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login-process', 'loginProcess')->name('login_process');
});
Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/registration', 'registration')->name('registration');
        Route::post('/registration-process', 'registrationProcess')->name('registration_process');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/web-admin', 'index')->name('dashboard');
    });

    Route::controller(HomeBannerController::class)->group(function () {
        Route::get('/home-banner-list', 'index')->name('home_banner_list');
        Route::get('/home-banner-add', 'create')->name('home_banner_add');
        Route::post('/home-banner-store', 'store')->name('home_banner_store');
        Route::get('/home-banner-edit/{id}/edit', 'edit')->name('home_banner_edit');
        Route::put('/home-banner-update/{id}', 'update')->name('home_banner_update');
        Route::delete('/home-banner-delete/{id}', 'destroy')->name('home_banner_destroy');
        Route::get('/home-banner-all', 'getHomeBanners')->name('home_banner_all');
    });

    Route::controller(FeatureController::class)->group(function () {
        Route::get('/feature-list', 'index')->name('feature_list');
        Route::get('/feature-add', 'create')->name('feature_add');
        Route::post('/feature-store', 'store')->name('feature_store');
        Route::get('/feature-edit/{id}/edit', 'edit')->name('feature_edit');
        Route::put('/feature-update/{id}', 'update')->name('feature_update');
        Route::delete('/feature-delete/{id}', 'destroy')->name('feature_destroy');
        Route::get('/feature-all', 'getFeatures')->name('feature_all');
    });

    Route::controller(CoreValueController::class)->group(function () {
        Route::get('/core-value-list', 'index')->name('core_value_list');
        Route::get('/core-value-add', 'create')->name('core_value_add');
        Route::post('/core-value-store', 'store')->name('core_value_store');
        Route::get('/core-value-edit/{id}/edit', 'edit')->name('core_value_edit');
        Route::put('/core-value-update/{id}', 'update')->name('core_value_update');
        Route::delete('/core-value-delete/{id}', 'destroy')->name('core_value_destroy');
        Route::get('/core-value-all', 'getCoreValues')->name('core_value_all');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/service-list', 'index')->name('service_list');
        Route::get('/service-add', 'create')->name('service_add');
        Route::post('/service-store', 'store')->name('service_store');
        Route::get('/service-edit/{id}/edit', 'edit')->name('service_edit');
        Route::put('/service-update/{id}', 'update')->name('service_update');
        Route::delete('/service-delete/{id}', 'destroy')->name('service_destroy');
        Route::get('/service-all', 'getservices')->name('service_all');
    });
});
