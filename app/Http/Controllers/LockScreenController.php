<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LockScreenController extends Controller
{
    //

    public function get(){

        // only if user is logged in
        if(\Auth::check()){
            \Session::put('locked', true);
            $previous_page = \Session::get('previous_page');

            if($previous_page == '')
                \Session::put('previous_page',\URL::previous());

            return view('auth.lockscreen');
        }

        return redirect('/login');
    }

    public function post()
    {
        // if user in not logged in
        if(!\Auth::check())
            return redirect('/login');

        $password = \Input::get('password');

        if(\Hash::check($password,\Auth::user()->password)){
            \Session::forget('locked');
            $previous_page = \Session::get('previous_page');
            \Session::forget('previous_page');
            return redirect($previous_page);
        }else{
            return redirect('/lockscreen')->with(['error'=>\Lang::get('auth.failed')]);
        }


    }
}
