<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * This app has no generic "login" route — only "admin.login" — so the
     * framework's default redirectTo (route('login')) would 500 otherwise.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            return route('admin.login');
        }

        return null;
    }
}
