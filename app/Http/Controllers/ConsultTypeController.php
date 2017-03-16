<?php

namespace App\Http\Controllers;

use App\ConsultType;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\ConsultTypeRequest;

class ConsultTypeController extends Controller
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
        $consult_type = ConsultType::All();
        return view('consult_type.index',compact('consult_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('consult_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ConsultTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultTypeRequest $request)
    {
        $consult_type = ConsultType::create($request->all());
        $currency_function = new Defaults();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_consult_type');
            return ['id'=>$consult_type->id,'name'=>$consult_type->name,'price'=>$currency_function->currency($consult_type->price),'message'=>$message,'form'=>'consult_type'];
        }else{
            return view('consult_type.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ConsultType  $consult_type
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultType $consult_type)
    {
        $currency_function = new Defaults();
        if (Request::wantsJson()){
            return ['name'=>$consult_type->name,'price'=>$currency_function->currency($consult_type->price),'total_price'=>$currency_function->currency($consult_type->price),'total'=>$consult_type->price];
        }else{
            //return view('patient.show',compact('patient'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ConsultType $consult_type
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultType $consult_type)
    {
        return view('consult_type.edit',compact('consult_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ConsultTypeRequest  $request
     * @param  ConsultType $consult_type
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultTypeRequest $request, ConsultType $consult_type)
    {
        $consult_type->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_consult_type');
            return ['values'=>$consult_type,'message'=>$message,'form'=>'consult_type'];
        }else{
            return view('consult_type.create');
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
}
