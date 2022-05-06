<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsStudent
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
        if(!Auth::check() && !Auth::guard('student')->check())
        {
            return redirect()->intended('/studentlogin')->with('protection','Must Be LoggedIn As A Student To Enter This URL');
        }

        else if(Auth::check())
        {
            return back()->with('protection','Your Account Is Not Permitted To Enter This URL');
        }

        return $next($request);
    }
}
