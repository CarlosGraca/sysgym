<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
//use Illuminate\Http\Request;
use Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permissions = Permission::create($request->all());

        if (\Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_permissions');
            return ['id'=>$permissions->id,'name'=>$permissions->name,'message'=>$message,'form'=>'permissions','type'=>'success'];
        }else{
            return view('permissions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param   Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PermissionRequest  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request,Permission $permission)
    {
        $permission->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_permissions');
            return ['values'=>$permission->name,'message'=>$message,'form'=>'permissions','type'=>'success'];
        }else{
            return view('permissions.edit');
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
        $permission = Permission::where('id',\Input::get('id'))->first();
        $permission->status = 0;

        if (Request::wantsJson() && $permission->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_permissions');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'permissions', 'type'=>'success'];
        }else{
            return redirect('clients');
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
        $permission = Permission::where('id',\Input::get('id'))->first();
        $permission->status = 1;

        if (Request::wantsJson() && $permission->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_permissions');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'permissions', 'type'=>'success'];
        }else{
            return redirect('permissions');
        }
    }
}
