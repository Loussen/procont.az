<?php

namespace App\Providers;

use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->setLocale(
            Session::get('backpack.language-switcher.locale', config('app.locale'))
        );

        Carbon::setLocale('az');

        $siteSettings = Settings::first();
        \view()->share('siteSettings',$siteSettings);

        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\UserCrudController::class, //this is package controller
            \App\Http\Controllers\Admin\UserCrudController::class //this should be your own controller
        );
    }
}
