<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
{
    if (auth()->check() && auth()->user()->rol === $role) {
        return $next($request);
    }

    return redirect('/'); // O la ruta que desees para redirigir en caso de acceso no autorizado
}
}
