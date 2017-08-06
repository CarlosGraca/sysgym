<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TenantMenu;
use App\Models\Menu;

use App\Models\Tenant;
use Input;


class TenantMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_id = Input::get('id');
        $menus = Menu::where('status',1)->pluck('title','id')->all();
        $tenants = Tenant::pluck('company_name','id')->all();
        return view('tenant_menu.create',compact('menus','tenants','menu_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach(Input::get('tenants') as $selected_id){
            $tenant_menu= new TenantMenu;
            $tenant_menu->tenant_id=$selected_id;
            $tenant_menu->menu_id=Input::get('menu_id');
            $tenant_menu->save();
        }
        session()->flash('flash_message','Tenant Menu was stored with success');
        return redirect('tenant-menu/create');
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
