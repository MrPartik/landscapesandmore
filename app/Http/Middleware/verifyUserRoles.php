<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class verifyUserRoles
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

        if(Auth::check() === true) {
            if(\Illuminate\Support\Facades\Auth::user()->role !== 'admin') {
                if(preg_match('/blog|admin$|admin\/themes|admin\/contact-us|admin\/warranty|admin\/careers|user|livewire/', \request()->path()) === 0) {
                    echo "<script>alert('Forbidden access'); window.location.href = '/admin';</script>";
                }
            }
            if (Auth::user()->is_active === false) {
                Session::flush();
                auth()->guard('web')->logout();
                echo "<script>alert('User is currently deactivated, please contact the administrator'); window.location.href = '/login';</script>";
            }
        }
        return $next($request);
    }
}
