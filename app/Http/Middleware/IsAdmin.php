<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            if(auth()->user()->is_admin == 0){
                return $next($request);
            }else
            {
                Auth::logout();
                return redirect('/dashboard');
            }
        }else{
            return redirect('login')->with('error',"Only authorize person can access!");
        }
    }
}
