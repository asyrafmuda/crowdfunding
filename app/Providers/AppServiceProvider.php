<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Laravel 5.4 made a change to the default database
         * character set, and it's now utf8mb4 which includes support for
         * storing emojis. This only affects new applications and as long as
         * you are running MySQL v5.7.7 and higher you do not need to do
         * anything (you can comment this code below).
         *
         * This schema is for make default string length on
         * database with max 191.
         */
        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
