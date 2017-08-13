<?php

namespace App\Http\Controllers;

use App\Models\Matriculation;
use App\Models\Modality;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Client;
use Auth;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_a = Client::where('status', 1)->where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_i = Client::where('status', 0)->where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_m = Modality::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_mt = Matriculation::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_p = Payment::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();


        return view('dashboard.index',compact('total_a','total_i','total_m','total_mt','total_p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
