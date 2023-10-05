<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

#use bootstrap to show paginator
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // https://github.com/hannanstd/change-laravel-public
//        $this->app->bind('path.public', function() {
//            return realpath(base_path().'/../../www/ose_laravel_public');
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        #use bootstrap to show paginator
        Paginator::useBootstrapFive();
    }
}
