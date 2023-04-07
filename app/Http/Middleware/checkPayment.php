<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkPayment
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
        if(auth()->check() && auth()->user()->Role == 'ADMIN'){
            return $next($request);
        }
        else
        {
            $response = response()->view('G_P.index');
            return $response;
        }
    }
}
