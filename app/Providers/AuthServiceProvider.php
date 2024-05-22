<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
        //Gate for permissions
        Gate::resource('permissions', 'App\Policies\PermissionPolicy');
        //Gate for Admins Users
        Gate::resource('users', 'App\Policies\UserPolicy');
        //Gate for Roles
        Gate::resource('roles', 'App\Policies\RolePolicy');        
    }
}
