<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Dominio;
use App\Models\Client;
use App\Models\Cobranca;
use Input;
use App\Http\Requests\CobrancaRequest;
use Auth;

class CobrancaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobrancas  = Cobranca::where('tenant_id',Auth::user()->tenant_id)->get();
        return view('adminlte::cobrancas.index',compact('cobrancas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idCliente = null;
        if (session()->has('idCliente')) {
             $idCliente =session('idCliente');
        }else{
              $idCliente =Input::get('id');
        }
        $client = Client::findorfail( $idCliente );

        $meses = Dominio::where('dominio','MES')->pluck('significado','id')->all();  
        $tipo_cobrancas = Dominio::where('dominio','TIPO_COBRANCA')->pluck('significado','id')->all();  
        return view('adminlte::cobrancas.create', compact('client','meses','tipo_cobrancas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ative_cliente($client){
         $client = Client::findorfail( $client );
         $client->status = 1;
         $client->save();
    }
    public function store(CobrancaRequest $request)
    {
        $tenant_id = Auth::user()->tenant_id; // some logic to decide user's plan
        $user_id = Auth::user()->id;
        $client_id = request('id_cliente');
        $request->request->add(['tenant_id' => $tenant_id]);
        $request->request->add(['user_id' => $user_id]);
        $request->request->add(['client_id' => $client_id]);
        $request->request->add(['estado' =>1]);
        


        $cobranca = Cobranca::create($request->all());

        $client = Client::findorfail( $client_id );
        $client->status = 1;
        $client->save();

        
        session()->flash('flash_message','Cobranca was stored with success');

        if (Request::wantsJson()){
            return $cobranca;
        }else{
            //session('idCliente', $client->id);
            return redirect('cobrancas')->with('idCliente',$cobranca->id);
        }
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
