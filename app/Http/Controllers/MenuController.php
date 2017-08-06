<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;

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
        $menus = Menu::all();
	    return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$menus = Menu::pluck('title','id');
        //
        return view('menus.create');
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


    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
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
        //
        return view('menus.edit',compact('menu'));
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
    
}
