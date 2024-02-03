<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->check() && in_array(Auth::user()->rol, $roles)) {
            return $next($request);
        }

        return redirect('/');
    }
}
