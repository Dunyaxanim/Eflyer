<?php

namespace App\Providers;

use App\Models\CustomMenu;
use App\Models\Category;
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
        view()->composer('front.partials._header', function ($view) {
            $view->with('customMenu', CustomMenu::get());
        });
        view()->composer('front.partials._header', function ($view) {
            $view->with('category', Category::get());
        });
    }
}
