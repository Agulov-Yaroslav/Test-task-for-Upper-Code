<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        else{
            return route('main');
        };
        if(Auth::check() && Auth::user()->role == 'admin')
        {
            return ($request);
        }
        else
        {
            return redirect()->back()->withErrors('You are admin');
        };
        if(Auth::check() && Auth::user()->role == 'user')
        {
            return $next($request);
        }
        else
        {
            return redirect()->back()->withErrors('You are not admin');
        };

    }
}
