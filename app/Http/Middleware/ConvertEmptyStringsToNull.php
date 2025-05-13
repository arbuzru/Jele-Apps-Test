<?php

namespace Illuminate\Http\Middleware;

use Closure;

class ConvertEmptyStringsToNull
{
    public function handle($request, Closure $next)
    {
        foreach ($request->all() as $key => $value) {
            if ($value === '') {
                $request->merge([$key => null]);
            }
        }

        return $next($request);
    }
}
