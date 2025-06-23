<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->userlevel_id == 2 || Auth::user()->userlevel_id == 3 || Auth::user()->userlevel_id == 4 || Auth::user()->userlevel_id == 5 || Auth::user()->userlevel_id == 6 || Auth::user()->userlevel_id == 7)
        {
            return redirect('pages/no-access');
        }
        
        return $next($request);
    }
}
