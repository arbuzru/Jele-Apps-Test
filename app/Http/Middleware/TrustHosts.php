<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrustHosts
{
    public function handle(Request $request, Closure $next)
    {
        $trustedHosts = ['yourdomain.com', 'sub.yourdomain.com'];  // Укажите свои хосты

        if (!in_array($request->getHost(), $trustedHosts)) {
            abort(403); // или перенаправление на другую страницу
        }

        return $next($request);
    }
}
