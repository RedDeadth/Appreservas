<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }

        return redirect('/dashboard'); // Cambia '/dashboard' por la ruta a la que deseas redirigir
    }
}
