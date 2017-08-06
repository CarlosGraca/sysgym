<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Domain;

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
        $status = Domain::where('codigo','STATUS')->pluck('significado','id')->all();    
        $menu_parents = Menu::where('parent_id',0)->pluck('title','id')->all();
        return view('menus.create',compact('menu_parents','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DominioRequest $request)
    {   
        $tenant_id = Auth::user()->tenant_id; // some logic to decide user's plan
        $request->request->add(['tenant_id' => $tenant_id]);
        $dominio = Dominio::create($request->all());
        session()->flash('flash_message','Dominio was stored with success');

        if (Request::wantsJson()){
            return $dominio;
        }else{
            return redirect('dominios');
        }
    }

}
