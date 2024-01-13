<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        foreach(config('permission')['permission'] as $key=> $val){
            Gate::define($val,function($abilty)use($key){
                return $abilty->HasAbilty($key);
            });
        }



        }
    }


