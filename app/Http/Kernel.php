<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Индекс глобальных HTTP-сервисов, которые должны быть зарегистрированы
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Http\Middleware\ConvertEmptyStringsToNull::class,
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Foundation\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Http\Middleware\SetCacheHeaders::class,
    ];

    /**
     * Сервис для регистрации промежуточных слоев для маршрутов в вашем приложении
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'csrf' => \App\Http\Middleware\VerifyCsrfToken::class,
    ];
}
