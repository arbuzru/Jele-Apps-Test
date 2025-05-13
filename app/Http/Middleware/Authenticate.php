<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Выполняет проверку аутентификации.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            // Если пользователь не аутентифицирован, перенаправляем на страницу входа
            return redirect()->route('login');
        }

        return $next($request);
    }
}
