<?php

namespace App\Http\Controllers;

use App\Island;
use Illuminate\Http\Request;

use App\Http\Requests;

class IslandController extends Controller
{
    //
    public function island(){
        $island = Island::all(['id','name']);
        return $island;
    }
}
