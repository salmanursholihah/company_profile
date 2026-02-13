<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Footer;
use App\Models\Image;


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
        View::composer('layouts.app_landing', function ($view) {
            $footer = Footer::first();
            $view->with('footer', $footer);
        });

        View::composer('layouts.app_landing', function ($view) {

            $footerLogos = Image::where('type', 'footer_logo')->get();

            $view->with('footerLogos', $footerLogos);
        });
    }
}
