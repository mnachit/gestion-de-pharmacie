<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->Role == 'USER'){
            return $next($request);
        }
        else
        {
            session()->flash('message', 'Vous devez d\'abord vous connecter');
            $response = response()->view('G_P.index');
            $response->cookie('name', 'value');
            return $response;
        }
    }
}
