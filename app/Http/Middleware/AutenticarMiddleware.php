<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AutenticarMiddleware
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
        
        if (Session::has('logado')) {
            return $next($request);
        }else{
            return redirect('autenticar');
        }
        
        
        return $next($request);
    }
}
