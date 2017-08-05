<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginActivity;

class LoginActivityController extends Controller
{
    public function index()
	{
	    $loginActivities = LoginActivity::whereUserId(auth()->user()->id)->latest()->paginate(10);
	    return view('adminlte::auth.login-activity', compact('loginActivities'));
	}
}
