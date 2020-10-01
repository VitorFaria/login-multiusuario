<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard == 'admin') // Se o guard estiver logado no admin
                return redirect()->route('admin.dashboard'); // Redireciona para a tala do admin caso tente acessar /login
            return redirect('/home'); // Do contrário, se tentar acessar como usuário, ele retorna pra home do usuário
        }

        return $next($request);
    }
}
