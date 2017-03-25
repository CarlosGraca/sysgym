<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcedureRequest;
use App\Procedure;
//use Illuminate\Http\Request;
use App\ProcedureGroup;
use Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedure = Procedure::all();
        return view('procedure.index',compact('procedure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedure_group = ProcedureGroup::pluck('name','id');
        return view('procedure.create',compact('procedure_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProcedureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureRequest $request)
    {
        $procedure = Procedure::create($request->all());

        if (\Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_procedure');
            return ['id'=>$procedure->id,'name'=>$procedure->name,'message'=>$message,'form'=>'procedure','type'=>'success'];
        }else{
            return view('procedure.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        return view('procedure.show',compact('procedure'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        $procedure_group = ProcedureGroup::pluck('name','id');
        return view('procedure.edit',compact('procedure','procedure_group'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureRequest  $request
     * @param  Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureRequest $request, Procedure $procedure)
    {
        $procedure->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_procedure');
            return ['values'=>$procedure,'message'=>$message,'form'=>'procedure','type'=>'success'];
        }else{
            return view('procedure.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        $procedure = Procedure::where('id',\Input::get('id'))->first();
        $procedure->status = 0;

        if (Request::wantsJson() && $procedure->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_procedure');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'procedure', 'type'=>'success'];
        }else{
            return redirect('patients');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $procedure = Procedure::where('id',\Input::get('id'))->first();
        $procedure->status = 1;

        if (Request::wantsJson() && $procedure->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_procedure');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'procedure'];
        }else{
            return redirect('procedure');
        }
    }
}
