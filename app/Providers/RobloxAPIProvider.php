<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\RobloxAPI;


class RobloxAPIProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RobloxAPI::class, function ($app) {
            return new RobloxAPI();
        });
    }
}
