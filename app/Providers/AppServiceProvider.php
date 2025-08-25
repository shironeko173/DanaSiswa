<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('SuperAdmin', function(User $user) {
            return $user->role === 'SuperAdmin';
        });

        if(env('APP_ENV') === 'production') {
        // URL::forceScheme('https');
        URL::forceRootUrl(config('app.url'));
        }
    }
}
