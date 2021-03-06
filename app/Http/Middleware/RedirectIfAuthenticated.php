<?php

namespace App\Http\Middleware;

use App\Models\System;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       /* $system = System::all()->first();
        \App::setLocale($system->lang);


        if($system->status == '2' && $request->isMethod('get')){
            return redirect('setup/system');
        }elseif ($system->status == '0' && $request->isMethod('get')){
            return redirect('license_expired');
        }
        */

        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
