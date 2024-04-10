<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Confirmation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {        
        if(url()->previous() =='http://laravel-duc:8000/carts' || url()->previous() =='http://laravel-duc:8000/carts/confirmation'){
            return $next($request);            
        }
        return redirect('/');
    }
}
