<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Repositories\User\UserEloquentRepository;
use Repositories\User\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind(UserRepository::class, fn() => new UserEloquentRepository());
    }
}
