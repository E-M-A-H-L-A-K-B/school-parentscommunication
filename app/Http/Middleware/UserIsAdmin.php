<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin
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
            return redirect()->intended('/userlogin')->with('protection','Must Be LoggedIn As Admin To Enter This URL');
        }

        else if(Auth::guard('student')->check())
        {
            return back()->with('protection','Your Account Is Not Permitted To Enter This URL');
        }
        
        else if(Auth::check())
        {
            if(!Auth::user()->admin)
            {
                return back()->with('protection','Your Account Is Not Permitted To Enter This URL');
            }
        }

        return $next($request);
    }
}
