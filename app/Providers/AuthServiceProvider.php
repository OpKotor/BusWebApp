<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Mape bilo kojih politika za vašu aplikaciju.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registrujte sve servise vezane za autentifikaciju / autorizaciju.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Možete definisati dodatne Gate pravila ovde, ako je potrebno.
        // Na primer:
        // Gate::define('view-dashboard', function ($user) {
        //     return $user->isAdmin();
        // });
    }
}