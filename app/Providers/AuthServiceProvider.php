<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Classe;
use App\Models\HistoryWallet;
use App\Policies\ChargePolicy;
use App\Policies\ClassePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Classe' => 'App\Policies\ClassePolicy',
        // Semester::class => ClassePolicy::class
        HistoryWallet::class => ChargePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
