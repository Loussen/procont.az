<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('products', 'ProductsCrudController');
    Route::crud('faqs', 'FaqsCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('settings', 'SettingsCrudController');
    Route::crud('menu-item', 'MenuItemCrudController');
    Route::crud('sliders', 'SlidersCrudController');
    Route::crud('contact-requests', 'ContactRequestsCrudController');
    Route::crud('blog', 'BlogCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('photo-gallery', 'PhotoGalleryCrudController');
    Route::crud('project', 'ProjectCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
