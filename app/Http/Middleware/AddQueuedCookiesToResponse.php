<?php

namespace Illuminate\Cookie\Middleware;

use Closure;
use Illuminate\Cookie\CookieJar;

class AddQueuedCookiesToResponse
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $cookieJar = app(CookieJar::class);
        $cookieJar->addQueuedCookiesToResponse($response);
        return $response;
    }
}
