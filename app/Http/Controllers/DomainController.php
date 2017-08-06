<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\DomainRequest;

use App\Models\Domain;
use App\User;
use Auth;

use Request;

class DomainController extends Controller
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
        $domains  = Domain::where('tenant_id',Auth::user()->tenant_id)->get();
        return view('domains.index',compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DomainRequest $request)
    {   
        $tenant_id = Auth::user()->tenant_id; // some logic to decide user's plan
        $request->request->add(['tenant_id' => $tenant_id]);
        $dominio = Domain::create($request->all());
        session()->flash('flash_message','Domain was stored with success');

        if (Request::wantsJson()){
            return $dominio;
        }else{
            return redirect('domains');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $dominio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Domain $dominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $dominio)
    {
        return view('domains.edit',compact('dominio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Domain $dominio
     * @return \Illuminate\Http\Response
     */
    public function update(DomainRequest $request, Domain $dominio)
    {
        $tenant_id = Auth::user()->tenant_id; // some logic to decide user's plan
        $request->request->add(['tenant_id' => $tenant_id]);
        $dominio->update($request->all());
        session()->flash('flash_message','Domain was update with success');

        if (Request::wantsJson()){
            return $dominio;
        }else{
            return redirect('domains');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Domain $dominio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $dominio)
    {
        $deleted= $dominio->delete();
        session()->flash('flash_message','Domain was removed with success');

        if (Request::wantsJson()){
            return (string) $deleted;
        }else{
            return redirect('domains');
        }
    }
}
