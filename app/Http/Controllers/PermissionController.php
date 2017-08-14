<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
//use Illuminate\Http\Request;
use Request;
use Auth;
use App\Models\Role;
use App\Models\TenantMenu;
use Input;

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
       // $permissions = Permission::where('tenant_id'=>Auth::user()->tenant_id)->get();
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
        $profiles = Role::where('tenant_id',Auth::user()->tenant_id)->pluck('display_name','id')->all();
        $menus = TenantMenu::with('menus')->get()->where('tenant_id',Auth::user()->tenant_id)->pluck('menus.title','id');

        $m_menus = TenantMenu::with('menus')->with('permissions')->get()->where('tenant_id',Auth::user()->tenant_id)
                              ->where('permissions.role_id',Auth::user()->role_id)
                              ->pluck('menus.title','id');

        return view('permissions.create',compact('profiles','menus','m_menus'));
    }

    /**[]
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
      public function store(PermissionRequest $request)
    {
        
        foreach(Input::get('permissions_menus') as $selected_id){
            $exist = Permission::where('type','MENU')->
                    where('tenant_menu_id',$selected_id)->
                    where('role_id',Input::get('role_id'))->first();
            if (!empty($exist)){                 
                $permission = new Permission;                      
                $permission->type = 'MENU';
                $permission->tenant_menu_id=$selected_id;
                $permission->role_id=Input::get('role_id');
                $permission->save();            }
        }
      
        session()->flash('flash_message',trans('adminlte_lang::message.msg_add_success_permissions'));
        if (Request::wantsJson()){
            return $permission;
        }else{  
            return redirect('permissions');
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
        $profiles = Role::where('tenant_id',Auth::user()->tenant_id)->pluck('display_name','id')->all();
        $menus = TenantMenu::with('menus')->get()->where('tenant_id',Auth::user()->tenant_id)->pluck('menus.title','id');

        $m_menus = TenantMenu::with('menus')->with('permissions')->get()->where('tenant_id',Auth::user()->tenant_id)
                              ->where('permissions.role_id',Auth::user()->role_id)
                              ->pluck('menus.title','id');
        return view('permissions.edit',compact('permission','profiles','menus','m_menus'));
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
