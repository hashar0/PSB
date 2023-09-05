<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
//gate import in role base
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('is_admin',function($user){
        return $user->role=='admin';
        });
        $gate->define('is_user',function($user){
            return $user->role=='user';
        });

    }
}
