<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
//use Illuminate\Http\Request;
use App\User;
use Request;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::orderby('id')->get();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        $role = Role::create($request->all());

        $permissions = $request->permissions;

        $delete_permission = $request->delete_permission;

        if(count($delete_permission) != 0){

            foreach ($delete_permission as $permission) {
                $p = Permission::whereName($permission)->first();
                if(count($p) > 0)
                    $role->detatch($p);
            }

        }

        if(count($permissions) != 0){

            foreach ($permissions as $permission) {
                $p = Permission::whereName($permission)->first();
                if(count($p) > 0 && !$role->hasPermission($p))
                    $role->assign($p);
            }
        }
        
        $url = route('roles.edit',$role->id);
        
        if (\Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_roles');
            return ['id'=>$role->id,'name'=>$role->name,'message'=>$message,'form'=>'roles','type'=>'success','url'=>$url];
        }else{
            return view('roles.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $users = User::all();
        //
        return view('roles.show',compact('role','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions = Permission::orderby('name')->get();
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleRequest  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request,Role $role)
    {
        //
        $role->update($request->all());

        $permissions = $request->permissions;
        
        $delete_permission = $request->delete_permission;

        if(count($delete_permission) != 0){

            foreach ($delete_permission as $permission) {
                $p = Permission::whereName($permission)->first();
                if(count($p) > 0)
                    $role->detatch($p);
            }

        }

        if(count($permissions) != 0){
            
            foreach ($permissions as $permission) {
                $p = Permission::whereName($permission)->first();
                if(count($p) > 0 && !$role->hasPermission($p->name))
                    $role->assign($p);
            }
        }

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_roles');
            return ['values'=>$role->name,'message'=>$message,'form'=>'roles','type'=>'success'];
        }else{
            return view('roles.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $role = Role::where('id',\Input::get('id'))->first();
        $role->status = 0;

        if (Request::wantsJson() && $role->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_roles');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'roles', 'type'=>'success'];
        }else{
            return redirect('roles');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $role = Role::where('id',\Input::get('id'))->first();
        $role->status = 1;

        if (Request::wantsJson() && $role->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_roles');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'roles', 'type'=>'success'];
        }else{
            return redirect('roles');
        }
    }
}
