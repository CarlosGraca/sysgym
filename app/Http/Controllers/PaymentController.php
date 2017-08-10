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
        
        $payments = DB::table('matriculation as a')
                  ->join('modalities as b', function($join) 
                            {
                                $join->on('a.modality_id', '=', 'b.id') ;                                   
                            })
                   ->leftjoin('payments as c', function($join) 
                            {
                                $join->on('a.id', '=', 'c.item_id');                                 
                            })
                   ->where('a.client_id', '=', $idCliente)
                   ->select('b.name','b.price','a.id as idmatricula','c.id as idpayment','c.discount','c.start_date','c.end_date','c.payment_method','c.free')
                    ->get();
         

       
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

        $client = Client::findorfail( $client_id );
        $client->status = 1;
        $client->save();
         
        if ($request->ajax()){            
            return Response::json(['message' => trans('adminlte_lang::message.msg_success_payment'), 'type' =>'success' ]);
        }
        return Response::json(['message' => 'Failed saved the mesa', 'type' => 'failed']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
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
    public function edit(Payment $payment)
    {
        return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, Payment $payment)
    {
        //
        $payment->note = $request->note;
        $payment->payment_method = $request->payment_method;

        if (Request::wantsJson() && $payment->save()){
            $message = trans('adminlte_lang::message.msg_update_payment_matriculation');
            return ['id'=>$payment->id,'message'=>$message,'form'=>'payment','type'=>'success'];
        }else{
            return redirect('payments');
        }
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
