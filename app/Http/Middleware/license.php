<?php

namespace App\Http\Middleware;

use App\Models\System;
use Closure;

class license
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
       /* $system = System::all()->first();

        if($system->status == '0' && $request->isMethod('get')){
            return redirect('license_expired');
        }else if(\Auth::user() == null && $request->isMethod('get')){
            return redirect('home');
        }else if(\Auth::user() == null && $request->isMethod('get') && $system->status == '1'){
            return redirect('home');
        }*/
        return $next($request);
    }
}
