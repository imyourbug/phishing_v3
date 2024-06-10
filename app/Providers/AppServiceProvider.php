<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        } else {
            URL::forceScheme('http');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.default');

        $settings = Cache::rememberForever('settings', function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });

        View::share('settings', $settings);
    }
}
