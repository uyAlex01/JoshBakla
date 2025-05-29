<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

// ✅ Add these two lines:
use App\Models\UserActivity;
use App\Observers\UserActivityObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        UserActivity::observe(UserActivityObserver::class);

        // Share categories with all views
        View::composer('*', function ($view) {
            $categories = Cache::remember('categories', now()->addDay(), function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });
    }
}
