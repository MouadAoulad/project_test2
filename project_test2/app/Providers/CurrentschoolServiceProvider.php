<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Currentschool\Currentschool;

class CurrentschoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('currentschool', function() {
            return new Currentschool();
        });
    }

    /**  
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
