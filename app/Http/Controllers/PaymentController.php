<?php

namespace App\Http\Controllers;

use App\Models\Matriculation;
use App\Models\Payment;
//use Illuminate\Http\Request;
use Request;
class PaymentController extends Controller
{
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
        //
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
//        $payment->value_pay = ($valor->paid == null ? 0 : $valor->paid);
//
//        if (Request::wantsJson() && $payment->save()){
//            return ['form'=>'payment'];
//        }else{
//            return redirect('payments');
//        }
//    }
    
}
