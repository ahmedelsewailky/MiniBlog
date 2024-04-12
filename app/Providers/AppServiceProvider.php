<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        if (!app()->runningInConsole()) {
            // Define Schema String Length
            Schema::defaultStringLength(191);
            // // Sharing Categories
            $categories = Category::take(6)->get();
            View::share('categories', $categories);
            // Sharing Settings
            $setting = Setting::all()->first();
            View::share('setting', $setting);
        }

    }
}
