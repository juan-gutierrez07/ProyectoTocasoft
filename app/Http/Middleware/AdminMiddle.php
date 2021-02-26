<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class AdminMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(auth()->check() && auth()->user()->roles[0]->rolname == "Administrador")
        {
            return $next($request);
        }

        return redirect('/noautorizado');
    }
}
