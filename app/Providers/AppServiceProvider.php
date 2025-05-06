<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registruje sve servise aplikacije.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Pokreće sve servise aplikacije.
     *
     * @return void
     */
    public function boot()
    {
        // Podešavanje default dužine string kolona za MySQL
        Schema::defaultStringLength(191);
    }
}