<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseRequest;
use App\License;
use Request;

class LicenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $license = License::all();
        return view('license.index',compact('license'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('license.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenseRequest $request)
    {
        $dt =  \Carbon\Carbon::now();
        $default = new Defaults();
        $license = new License();
        $product_key = $request->product_key;
        $license_to = $request->license_to;
        $result = $default->validate_license($product_key,$license_to);

       // die('morreu');

        if ($result != 1){
            $message = trans('adminlte_lang::message.msg_add_error_invalid_license');
            return ['message'=>$message,'form'=>'license','type'=>'error'];
        }



        $duration = intval($default->getAmountTime());
        $t = $default->getTypeTime();

        switch ($t){
            case 'D':
                #echo "$duration - DAY";
                $license->deadline = $dt->addDays($duration);
                break;
            case 'M':
                #echo "$duration - MONTH";
                $license->deadline = $dt->addMonths($duration);
                break;
            case 'Y':
                #echo "$duration - YEAR";
                $license->deadline = $dt->addYears($duration);
                break;
        }
        //echo ''.$license->deadline;
        $license->product_key = $product_key;
        $license->license_to = $license_to;
        $license->user_id = \Auth::user()->id;
        $license->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_license');
            return ['message'=>$message,'form'=>'license','type'=>'success'];
        }else{
            return view('category.create');
        }
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
    public function edit(License $license)
    {
        return view('license.edit',compact('license'));
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
