<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * URI, которые должны быть исключены из проверки CSRF.
     *
     * @var array
     */
    protected $except = [
        // Здесь можно перечислить URL-адреса, которые не нуждаются в проверке CSRF
        // Например, если какой-то API не использует CSRF
        'api/*',
    ];
}
