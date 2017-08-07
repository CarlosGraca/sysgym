<?php

namespace App\Http\Controllers;


use App\Http\Requests\MenuRequest;

use App\Models\Menu;
use App\Models\Domain;
use App\Models\Tenant;
use App\Models\TenantMenu;
use Input;

class MenuController extends Controller
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
        /*$menus = Menu::orderby('parent_id','asc')->orderby('menu_order','asc')->get();//->latest()->paginate(10);
	    return view('menus.index', compact('menus'));*/


        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $tenants = Tenant::pluck('company_name','id')->all();
    //     $status = Domain::where('dominio','STATUS')->pluck('significado','codigo')->all();    
    //     $menu_parents = Menu::where('parent_id',0)->pluck('title','id')->all();
    //     return view('menus.create',compact('menu_parents','status','tenants'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(MenuRequest $request)
    // {   
       
    //     $menu = Menu::create($request->all());

    //     foreach(Input::get('tenants') as $selected_id){
    //         $tenant_menu= new TenantMenu;
    //         $tenant_menu->tenant_id=$selected_id;
    //         $tenant_menu->menu_id=$menu->id;
    //         $tenant_menu->save();
    //     }

    //     session()->flash('flash_message','Menu was stored with success');

    //     if (Request::wantsJson()){
    //         return $menu;
    //     }else{
    //         return redirect('menus');
    //     }
    // }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    // public function edit(Menu $menu)
    // {
    //     $tenants = Tenant::pluck('company_name','id')->all();
    //     $status = Domain::where('dominio','STATUS')->pluck('significado','codigo')->all();    
    //     $menu_parents = Menu::where('parent_id',0)->pluck('title','id')->all();
    //     return view('menus.edit',compact('menu','menu_parents','status','tenants'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    // public function update(MenuRequest $request, Menu $menu)
    // {
       
    //     $menu->update($request->all());
    //     session()->flash('flash_message','Menu was update with success');

    //     if (Request::wantsJson()){
    //         return $menu;
    //     }else{
    //         return redirect('menus');
    //     }
    // }

    /**
     * Remove the specified resource from storage.


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = Tenant::pluck('company_name','id')->all();
        return view('menus.create',compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->icon = $request->icon;
        $menu->parent_id = $request->parent_id;
        $menu->menu_order = $request->menu_order;
        $menu->description = $request->description;

        if (\Request::wantsJson() && $menu->save()){
            $url = route('menus.edit',$menu->id);
            $message = trans('adminlte_lang::message.msg_add_success_menu');
            return ['id'=>$menu->id,'name'=>$menu->title,'message'=>$message,'form'=>'menu','type'=>'success','url'=>$url];
        }else{
            return view('menus.create');
        }

    }


    public function show(Menu $menu)
    {
        return view('menus.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $tenants = Tenant::pluck('company_name','id')->all();
        return view('menus.edit',compact('menu','tenants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuRequest  $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request,Menu $menu)
    {
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->icon = $request->icon;
        $menu->parent_id = $request->main_menu != '' ? $request->parent_id : 0;
        $menu->menu_order = $request->menu_order;
        $menu->description = $request->description;

        if (\Request::wantsJson() && $menu->save()){
            $message = trans('adminlte_lang::message.msg_update_success_menu');
            return ['id'=>$menu->id,'name'=>$menu->title,'message'=>$message,'form'=>'menu','type'=>'success'];
        }else{
            return view('menus.create');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */

    public function destroy(Menu $menu)
    {
        $deleted= $menu->delete();
        session()->flash('flash_message','Menu was removed with success');

        if (Request::wantsJson()){
            return (string) $deleted;
        }else{
            return redirect('menus');
        }
    }

    public function tenant_menu($menu){
        
    }
}
