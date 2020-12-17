<?php

namespace App\Http\Middleware;

use Closure;
use Auth;use App\User;
class Admin
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

        if (Auth::user()->role == 'User') {
            return redirect()->route('index');
        }else{
            // return redirect()->route('dashboard');
            return $next($request);
        }
    }
}
