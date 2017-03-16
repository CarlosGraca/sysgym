<?php

namespace App\Http\Controllers;

use App\ConsultType;
use App\Http\Requests\SecureCardRequest;
use App\Http\Requests\SecureComparticipationRequest;
use App\SecureAgency;
use App\SecureComparticipation;
use Request;


class SecureComparticipationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
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
        $secure_comparticipation = SecureComparticipation::all();
        return view('secure_comparticipation.index',compact('secure_comparticipation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //SECURITY AGENCY ARRAY DATA TO SELECT
        $secure_agency = SecureAgency::pluck('name','id');

        //CONSULT TYPE ARRAY DATA TO SELECT
        $consult_type = ConsultType::pluck('name','id');

        return view('secure_comparticipation.create',compact('secure_agency','consult_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SecureComparticipationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecureComparticipationRequest $request)
    {
        $secure_comparticipation = SecureComparticipation::create($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_secure_comparticipation');
            return ['values'=>$secure_comparticipation,'message'=>$message,'form'=>'secure_comparticipation'];
        }else{
            return view('secure_comparticipation.create');
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
     * @param  SecureComparticipation  $secure_comparticipation
     * @return \Illuminate\Http\Response
     */
    public function edit(SecureComparticipation $secure_comparticipation)
    {
        //SECURITY AGENCY ARRAY DATA TO SELECT
        $secure_agency = SecureAgency::pluck('name','id');

        //CONSULT TYPE ARRAY DATA TO SELECT
        $consult_type = ConsultType::pluck('name','id');

        return view('secure_comparticipation.edit',compact('secure_agency','consult_type','secure_comparticipation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SecureComparticipationRequest  $request
     * @param  SecureComparticipation  $secure_comparticipation
     * @return \Illuminate\Http\Response
     */
    public function update(SecureComparticipationRequest $request,SecureComparticipation $secure_comparticipation)
    {
        $secure_comparticipation->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_secure_comparticipation');
            return ['values'=>$secure_comparticipation->code,'message'=>$message,'form'=>'secure_comparticipation'];
        }else{
            return view('secure_comparticipation.edit');
        }
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


    public function getSecureComparticipation(){
        $currency_function = new Defaults();
        $consult_type_id = \Input::get('consult_type_id');
        $secure_agency_id = \Input::get('secure_agency_id');

        $secure_comparticipation = SecureComparticipation::select(['consult_type.name', 'secure_comparticipation.max_value', 'consult_type.price'])
            ->join('consult_type', 'secure_comparticipation.consult_type_id', '=', 'consult_type.id')->where('consult_type.id',$consult_type_id)->where('secure_comparticipation.secure_agency_id',$secure_agency_id)->first();

        if(empty($secure_comparticipation)){
            $consult_type = ConsultType::select(['name','price'])->where('id',$consult_type_id)->first();
            return ['name'=>$consult_type->name,'max_value'=>$currency_function->currency(0),'price'=>$currency_function->currency($consult_type->price),'total_price'=>$currency_function->currency($consult_type->price),'total'=>$consult_type->price];
        }

        $total = $secure_comparticipation->price - $secure_comparticipation->max_value;

        return ['name'=>$secure_comparticipation->name,'max_value'=>$currency_function->currency($secure_comparticipation->max_value),'price'=>$currency_function->currency($secure_comparticipation->price),'total_price'=>$currency_function->currency($total),'total'=>$total];
    }
}
