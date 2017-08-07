<?php

namespace App\Http\Middleware;

use App\Models\System;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if(\Auth::user() != null){
            $system = System::where('id',\Auth::user()->branch_id)->first();
            if(count($system) > 0){
                \App::setLocale($system->lang);

                if($system->status == '2' && $request->isMethod('get')){ //VERIFY THE STATUS OF SYSTEM
                    return redirect('setup/system');
                }elseif ($system->status == '0' && $request->isMethod('get')){
                    return redirect('license_expired');
                }else{
                    if($system->status != '2' && $request->isMethod('post')){
                        $this->authenticate($guards);
                    }
                }
            }


            if(\Auth::user()->status == 2 && $request->isMethod('get')){
                return redirect('user/setup/password');
            }elseif(\Auth::check() && (\Auth::user()->status != 1 && \Auth::user()->status != 2)){
                \Auth::logout();
                return redirect('login')->with('status', \Lang::get('auth.disable'));
            }
        }else{
            \Auth::logout();
            return redirect('login');
        }

        return $next($request);
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        throw new AuthenticationException('Unauthenticated.', $guards);
    }
}
