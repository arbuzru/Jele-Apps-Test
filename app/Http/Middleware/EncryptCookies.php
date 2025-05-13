<?php

namespace Illuminate\Cookie\Middleware;

use Closure;
use Illuminate\Cookie\CookieJar;

class EncryptCookies
{
    protected $except = [];

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $cookieJar = app(CookieJar::class);

        foreach ($this->except as $cookie) {
            $cookieJar->unencrypt($cookie);
        }

        return $response;
    }
}
