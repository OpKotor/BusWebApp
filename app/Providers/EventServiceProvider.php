<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Mapa događaja na njihove slušaoce.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Primer: Mapiranje događaja na slušaoce
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\SomeEventListener',
        // ],
    ];

    /**
     * Registrujte sve događaje aplikacije.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Odredite da li se automatsko otkrivanje događaja i slušaoca treba koristiti.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}