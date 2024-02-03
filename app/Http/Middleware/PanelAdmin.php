<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\Auth;

    class PanelAdmin
    {
        public function handle($request, Closure $next)
        {
            if (auth()->check() && auth()->user()->rol != 'cliente') {
                return $next($request);
            }

            return redirect('/');
        }
    }
