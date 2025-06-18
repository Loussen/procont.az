<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

$locales = implode('|',array_keys(Config::get('data.locales')));

getRegistrar();

function getRegistrar(): void
{
    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'dashboard')->name('home');
        Route::get('/products', 'products')->name('products');
        Route::get('/services', 'services')->name('services');
        Route::get('/departments', 'departments')->name('departments');
        Route::get('/doctors', 'doctors')->name('doctors');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/video-gallery', 'videoGallery')->name('video-gallery');
        Route::get('/blogs', 'blogs')->name('blogs');

        Route::get('/product/{id}', 'product')->name('product');
        Route::get('/service/{id}', 'service')->name('service');
        Route::get('/department/{id}', 'department')->name('department');
        Route::get('/doctor/{id}', 'doctor')->name('doctor');
        Route::get('/blog/{id}', 'blog')->name('blog');

        Route::get('/page/{slug?}', 'page')->name('page');
    });
}

Route::group([
    'prefix' => '{locale?}',
    'where' => ['locale' => $locales],
    'middleware' => 'locale'
], function () {
    getRegistrar();
});

Route::post('/contactForm', [MainController::class,'contactForm'])->name('contactForm');
