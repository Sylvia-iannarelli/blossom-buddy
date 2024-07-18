<?php

namespace App\Providers;

use App\Http\Controllers\AuthController;
use App\Interfaces\AuthControllerInterface;
use App\Services\PerenualApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthControllerInterface::class, AuthController::class);
        $this->app->singleton(PerenualApiService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
