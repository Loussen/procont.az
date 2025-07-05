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
        Route::get('/products/{category_id?}', 'products')->name('products');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/photo-gallery', 'photoGallery')->name('photo-gallery');
        Route::get('/blogs', 'blogs')->name('blogs');
        Route::get('/projects', 'projects')->name('projects');

        Route::get('/product/{slug}', 'product')->name('product');
        Route::get('/blog/{slug}', 'blog')->name('blog');
        Route::get('/project/{slug}', 'project')->name('project');

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
