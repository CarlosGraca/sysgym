<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;

use App\Models\Menu;
use App\Models\Domain;

use Request;

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
        $menus = Menu::orderby('menu_order','asc')->orderby('parent_id','asc')->get();//->latest()->paginate(10);
	    return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Domain::where('dominio','STATUS')->pluck('significado','codigo')->all();    
        $menu_parents = Menu::where('parent_id',0)->pluck('title','id')->all();
        return view('menus.create',compact('menu_parents','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {   
       
        $menu = Menu::create($request->all());
        session()->flash('flash_message','Menu was stored with success');

        if (Request::wantsJson()){
            return $menu;
        }else{
            return redirect('menus');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $status = Domain::where('dominio','STATUS')->pluck('significado','codigo')->all();    
        $menu_parents = Menu::where('parent_id',0)->pluck('title','id')->all();
        return view('menus.edit',compact('menu','menu_parents','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
       
        $menu->update($request->all());
        session()->flash('flash_message','Menu was update with success');

        if (Request::wantsJson()){
            return $menu;
        }else{
            return redirect('menus');
        }
    }

    /**
     * Remove the specified resource from storage.
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

}
