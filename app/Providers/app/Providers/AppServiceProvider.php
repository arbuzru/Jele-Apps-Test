<?php

namespace App\Providers\app\Providers;

use App\Providers\SomeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SomeService::class, function ($app) {
            return new SomeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^\+?[1-9]\d{1,14}$/', $value); // Пример для валидации телефона
        });
    }
}
