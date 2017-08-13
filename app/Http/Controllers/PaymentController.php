<?php

namespace App\Http\Controllers;

use App\Models\Matriculation;
use App\Models\Payment;
use Input;
use App\Models\Client;
use App\Models\Domain;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Request;
use App\Http\Requests\PaymentRequest;
use Auth;
use Response;
class PaymentController extends Controller
{

     /**
     * Create a new controller instance.
     *
     *
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
        $payments = Payment::all();

        if (Request::wantsJson()) {
            return $payments;
        } else {
            return view('payments.index',compact('payments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idCliente = Input::get('idCliente');
        $idMatricula = Input::get('idMatriculation');
        if($idMatricula){
            $payments = DB::table('matriculation as a')
                      ->join('modalities as b', function($join) 
                                {
                                    $join->on('a.modality_id', '=', 'b.id') ;                                   
                                })
                       ->leftjoin('payments as c', function($join) 
                                {
                                    $join->on('a.id', '=', 'c.item_id')
                                    ->where('c.status','=',1)
                                    ->where('c.id','=',0);                                 
                                })
                       ->where('a.client_id', '=', $idCliente)
                       ->where('a.id','=',$idMatricula)
                       ->where('a.status','=',1) 
                       ->select('b.name','b.price','a.id as idmatricula','c.id as idpayment',DB::raw('b.price as subtotal'),'c.discount','c.start_date','c.end_date','c.payment_method','c.free','c.type as payment_type')
                        ->get();
        }else{
            $payments = DB::table('matriculation as a')
                  ->join('modalities as b', function($join) 
                            {
                                $join->on('a.modality_id', '=', 'b.id');                          
                            })
                   ->leftjoin('payments as c', function($join) 
                            {
                                $join->on('a.id', '=', 'c.item_id')
                                ->where('c.status','=',1) 
                                ->where('c.id','=',0);                                  
                            })
                   ->where('a.client_id', '=', $idCliente)
                   ->where('a.status','=',1) 
                   ->select('b.name','b.price','a.id as idmatricula','c.id as idpayment',DB::raw('b.price as subtotal'),'c.discount','c.start_date','c.end_date','c.payment_method','c.free','c.type as payment_type')
                    ->get();
        }
        if (\App::environment('local')) {
                // The environment is local
                DB::enableQueryLog();
            }
        $client = Client::findorfail( $idCliente );
        $meses = Domain::where('dominio','MES')->pluck('significado','id')->all();  
        return view('payments.create',compact('client','meses','payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $tenant_id = Auth::user()->tenant_id; 
        $user_id   = Auth::user()->id;
        $branch_id = Auth::user()->branch_id;
        foreach(Input::get($request->all) as $req){

            $payment = new Payment();
           
            if ((string)$req['item_id'] != null){
                $payment->tenant_id      = $tenant_id;
                $payment->user_id        = $tenant_id;
                $payment->branch_id      = $branch_id;
                $payment->tenant_id      = $tenant_id;
                $payment->client_id      = (string)$req['client_id'];
                $payment->item_id        = (string)$req['item_id'];
                $payment->item_type      = (string)$req['item_type'];
                $payment->start_date     = (string)$req['start_date'];
                $payment->end_date       = (string)$req['end_date'];
                $payment->payment_method = (string)$req['payment_method'];
                $payment->type           = (string)$req['type'];
                $payment->note           = (string)$req['note'];
                $payment->discount       = (string)$req['discount'];
                $payment->free           = (string)$req['free'];
                $payment->status         = 1;
                $payment->value_pay      = (string)$req['value_pay'];
                $payment->save();

                $client_id = (string)$req['client_id'];
            }
        }        

        $client = Client::findorfail( $client_id );
        $client->status = 1;
        $client->save();
         
       if ($request->ajax()){
            $message = trans('adminlte_lang::message.msg_success_created_payment');
            return response ()->json(['message'=>$message,'type'=>'success']);
        }else{
            $payments = Payment::all();
            return view('payments.index',compact('payments'));
        }
        return response ()->json(['message'=>'Ops.','type'=>'error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show( $payment)
    {
        //
        return view('payments.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
        $idCliente = Input::get('idCliente');
        $idMatricula = Input::get('idMatriculation');
        if($idMatricula){
            $payments = DB::table('matriculation as a')
                      ->join('modalities as b', function($join) 
                                {
                                    $join->on('a.modality_id', '=', 'b.id') ;                                   
                                })
                       ->join('payments as c', function($join) 
                                {
                                    $join->on('a.id', '=', 'c.item_id')
                                    ->where('c.status','=',1);                                 
                                })
                       ->where('a.client_id', '=', $idCliente)
                       ->where('a.id','=',$idMatricula)
                       ->select('b.name','c.value_pay as price' ,'a.id as idmatricula','c.id as idpayment',DB::raw('c.value_pay-((c.value_pay*c.discount)/100) as subtotal'),'c.discount','c.start_date','c.end_date','c.payment_method','c.free','c.type as payment_type')
                        ->get();
        }else{
            $payments = DB::table('matriculation as a')
                  ->join('modalities as b', function($join) 
                            {
                                $join->on('a.modality_id', '=', 'b.id');                          
                            })
                   ->join('payments as c', function($join) 
                            {
                                $join->on('a.id', '=', 'c.item_id')
                                ->where('c.status','=',1) ;                                  
                            })
                   ->where('a.client_id', '=', $idCliente)
                   
                   ->select('b.name','c.value_pay as price','a.id as idmatricula','c.id as idpayment',DB::raw('c.value_pay-((c.value_pay*c.discount)/100) as subtotal'),'c.discount','c.start_date','c.end_date','c.payment_method','c.free','c.type as payment_type')
                    ->get();
        }
       
        $client = Client::findorfail( $idCliente );
        $meses = Domain::where('dominio','MES')->pluck('significado','id')->all();  
        return view('payments.edit',compact('client','meses','payments'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, $payment=null)
    {
       
    }
    
    public function updatePaymentOption(PaymentRequest $request)
    {
        $tenant_id = Auth::user()->tenant_id; 
        $user_id   = Auth::user()->id;
        $branch_id = Auth::user()->branch_id;
        foreach(Input::get($request->all) as $req){
                   
            if ((string)$req['item_id'] != null){
                $payment = Payment::find((string)$req['payment_id']);  
               
                $payment->tenant_id      = $tenant_id;
                $payment->user_id        = $tenant_id;
                $payment->branch_id      = $branch_id;
                $payment->tenant_id      = $tenant_id;
                $payment->client_id      = (string)$req['client_id'];
                $payment->item_id        = (string)$req['item_id'];
                $payment->item_type      = (string)$req['item_type'];
                $payment->start_date     = (string)$req['start_date'];
                $payment->end_date       = (string)$req['end_date'];
                $payment->payment_method = (string)$req['payment_method'];
                $payment->type           = (string)$req['type'];
                $payment->note           = (string)$req['note'];
                $payment->discount       = (string)$req['discount'];
                $payment->free           = (string)$req['free'];
                $payment->status         = 1;
                $payment->value_pay      = (string)$req['value_pay'];
                $payment->save();
            }
        }        

        if ($request->ajax()){
            $message = trans('adminlte_lang::message.msg_success_updated_payment');
            return response ()->json(['message'=>$message,'type'=>'success']);
        }else{
            $payments = Payment::all();
            return view('payments.index',compact('payments'));
        }
        return response ()->json(['message'=>'Ops.','type'=>'error']);
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

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function procedure(\Illuminate\Http\Request $request)
//    {
//        $procedures = json_decode($request->procedure);
//        $matriculation_id = $request->matriculation_id;
//        $payment_id = $request->payment_id;
//
//        if (is_array($procedures)){
//            foreach ($procedures as $item) {
//
//                $has_procedure = MatriculationProcedure::where('id',$item->id)->where('matriculation_id', $matriculation_id)->first();
//                if($has_procedure){
//                    $has_procedure->value_pay = doubleval($has_procedure->value_pay + $item->value);
//                    $has_procedure->remaining = $item->remaining;
//                    $has_procedure->user_id =  \Auth::user()->id;
//                    $has_procedure->save();
//                }
//            }
//        }
//
//        $payment = Payment::where('id',$payment_id)->first();
//        $valor = MatriculationProcedure::select(\DB::raw('sum(value_pay) as paid'))->where(['matriculation_id'=>$matriculation_id,'status'=>1])->first();
//
//        $payment->value_pay = ($valor->paid == null ? 1 : $valor->paid);
//
//        if (Request::wantsjon()) && $payment->save()){
//            return ['form'=>'payment'];
//        }else{
//            return redirect('payments');
//        }
//    }
    
}
