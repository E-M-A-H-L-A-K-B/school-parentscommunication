<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsStaff
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
        if(Auth::guard('student')->check())
        {
            return back()->with('protection','Only Staff Are Permitted');
        }

        else if(!Auth::guard('student')->check() && !Auth::check())
        {
            return redirect()->intended('/userlogin')->with('protection','You Must Login As A Staff Member To Enter This URL');
        }
        
        return $next($request);
    }
}
