<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrustProxies
{
    public function handle(Request $request, Closure $next)
    {
        $request->setTrustedProxies(
        // Укажите IP-адреса или маски IP-адресов прокси
            ['0.0.0.0/0'],
            Request::HEADER_X_FORWARDED_ALL
        );

        return $next($request);
    }
}
