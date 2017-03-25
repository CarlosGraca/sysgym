<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcedureGroupRequest;
use App\ProcedureGroup;
//use Illuminate\Http\Request;
use Request;


class ProcedureGroupController extends Controller
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
        //
        $procedure_group = ProcedureGroup::all();
        return view('procedure_group.index',compact('procedure_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('procedure_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProcedureGroupRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureGroupRequest $request)
    {
        $procedure_group = ProcedureGroup::create($request->all());

        if (\Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_procedure_group');
            return ['id'=>$procedure_group->id,'name'=>$procedure_group->name,'message'=>$message,'form'=>'procedure_group','type'=>'success'];
        }else{
            return view('procedure_group.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ProcedureGroup $procedure_group
     * @return \Illuminate\Http\Response
     */
    public function show(ProcedureGroup $procedure_group)
    {
        //
        return view('procedure_group.show',compact('procedure_group'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProcedureGroup $procedure_group
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcedureGroup $procedure_group)
    {
        //
        return view('procedure_group.edit',compact('procedure_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureGroupRequest $request
     * @param  ProcedureGroup $procedure_group
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureGroupRequest $request, ProcedureGroup $procedure_group)
    {
        $procedure_group->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_procedure_group');
            return ['values'=>$procedure_group,'message'=>$message,'form'=>'procedure_group','type'=>'success'];
        }else{
            return view('procedure_group.create');
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
        $procedure_group = ProcedureGroup::where('id',\Input::get('id'))->first();
        $procedure_group->status = 0;

        if (Request::wantsJson() && $procedure_group->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_procedure_group');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'procedure_group', 'type'=>'success'];
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
        $procedure_group = ProcedureGroup::where('id',\Input::get('id'))->first();
        $procedure_group->status = 1;

        if (Request::wantsJson() && $procedure_group->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_procedure_group');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'procedure_group'];
        }else{
            return redirect('procedure_group');
        }
    }
}
