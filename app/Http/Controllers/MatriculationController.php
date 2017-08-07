<?php

namespace App\Http\Controllers;

//use App\Modality;
use App\Models\Matriculation;
use App\Models\Employee;
use App\Http\Requests\MatriculationRequest;
use App\Models\Client;
use App\Models\Modality;
use App\Models\Payment;
use App\Models\System;
//use Illuminate\Http\Request;
use Request;

class MatriculationController extends Controller
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
        $matriculation = Matriculation::all();
        return view('matriculation.index',compact('matriculation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CONSULT TYPE ARRAY DATA TO SELECT
        $modality = Modality::pluck('name', 'id');

        $last_modality = Matriculation::select(['id'])->orderby('id','desc')->first();

        return view('matriculation.create', compact('modality','last_modality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatriculationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculationRequest $request)
    {
        //
        $matriculation = new Matriculation();
        $matriculation->note = $request->note;
        $matriculation->client_id = $request->client_id;
        $matriculation->branch_id = \Auth::user()->branch_id;
        $matriculation->user_id = $request->user_id;
        
        if (Request::wantsJson() && $matriculation->save()){
            $url = route('matriculation.edit', $matriculation->id);
//            $method = "PATH";
//            $data_name = trans('adminlte_lang::message.of').' '.$matriculation->client->name;
            $message = trans('adminlte_lang::message.msg_create_success_matriculation');
            return ['id'=>$matriculation->id,'message'=>$message,'form'=>'matriculation','type'=>'success','url'=>$url];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Matriculation $matriculation
     * @return \Illuminate\Http\Response
     */
    public function show(Matriculation $matriculation)
    {
        $matriculation_modality = Matriculation::where(['matriculation_id'=>$matriculation->id,'status'=>1])->get();

        $valor = Matriculation::select(\DB::raw('sum(total) as total'))->where(['matriculation_id'=>$matriculation->id,'status'=>1])->first();

        return view('matriculation.show',compact('matriculation','matriculation_modality','valor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Matriculation $matriculation
     * @return \Illuminate\Http\Response
     */
    public function edit(Matriculation $matriculation)
    {
        //CONSULT TYPE ARRAY DATA TO SELECT
        $modality = Modality::pluck('name', 'id');

        $last_modality = Matriculation::select(['id'])->orderby('id','desc')->first();
        
        $matriculation_modality = Matriculation::where(['matriculation_id'=>$matriculation->id,'status'=>1])->get();

        $valor = Matriculation::select(\DB::raw('sum(total) as total'))->where(['matriculation_id'=>$matriculation->id,'status'=>1])->first();
        
        return view('matriculation.edit',compact('matriculation', 'secure_agency', 'doctor', 'teeth','modality','last_modality','matriculation_modality','valor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatriculationRequest $request
     * @param  Matriculation $matriculation
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculationRequest $request, Matriculation $matriculation)
    {
        $matriculation->note = $request->note;
        $matriculation->client_id = $request->client_id;
//        $matriculation->total = $request->total;
//        $matriculation->doctor_id = $request->doctor_id;
        $matriculation->user_id = $request->user_id;
        
        if (Request::wantsJson() && $matriculation->save()){
            $message = trans('adminlte_lang::message.msg_update_success_matriculation');
            return ['id'=>$matriculation->id,'message'=>$message,'form'=>'matriculation','type'=>'success'];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject()
    {
        //
        $matriculation = Matriculation::where('id',\Input::get('id'))->first();
        $matriculation->status = 4;

        if (Request::wantsJson() && $matriculation->save()){
            $message = trans('adminlte_lang::message.msg_success_reject_matriculation');
            return ['status_color'=>'bg-warning','message'=>$message,'form'=>'matriculation', 'type'=>'success'];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish()
    {

        $matriculation = Matriculation::where('id',\Input::get('id'))->first();

        $modality = Matriculation::where('matriculation_id', $matriculation->id)->get();

        if(count($modality) == 0){
            $message = trans('adminlte_lang::message.msg_error_publish_matriculation');
            return ['message'=>$message,'form'=>'matriculation', 'type'=>'error'];
        }else{
            $matriculation->status = 2;
        }

        if (Request::wantsJson() && $matriculation->save()){
            $message = trans('adminlte_lang::message.msg_success_publish_matriculation');
            return ['status_color'=>'bg-info','message'=>$message,'form'=>'matriculation', 'type'=>'success'];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {
        $matriculation = Matriculation::where('id',\Input::get('id'))->first();
        $matriculation->status = 3;

        if (Request::wantsJson() && $matriculation->save()){
            $message = trans('adminlte_lang::message.msg_success_approve_matriculation');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'matriculation', 'type'=>'success', 'action'=>'approve'];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        $matriculation = Matriculation::where('id',\Input::get('id'))->first();
        $matriculation->status = 0;

        if (Request::wantsJson() && $matriculation->save()){
            $message = trans('adminlte_lang::message.msg_success_cancel_matriculation');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'matriculation', 'type'=>'success'];
        }else{
            return redirect('matriculation');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modality(\Illuminate\Http\Request $request)
    {
        $modality = json_decode($request->modalities);
        $delete = json_decode($request->delete);
        $matriculation_id = $request->matriculation_id;

        $client_id = $request->client_id;

        //$system = System::all()->first();

        if (is_array($delete)){
            foreach ($delete as $item) {
                $has_modality = Matriculation::where('id', $item)->where('matriculation_id', $matriculation_id)->first();
                $has_modality->delete();
//                if($has_modality){
//                    $has_modality->status = 0;
//                    $has_modality->save();
//                }
            }
        }

        if (is_array($modality)){
            foreach ($modality as $item) {

                $has_modality = Matriculation::where(['id'=>$item->id, 'matriculation_id' => $matriculation_id, 'client_id' => $client_id])->first();

                if($has_modality){
                    $has_modality->modality_id = $item->modality_id;
                    $has_modality->total = $item->total;
                    $has_modality->matriculation_id = $matriculation_id;
                    $has_modality->price = $item->price;
                    $has_modality->discount = $item->discount;
                    $has_modality->user_id =  \Auth::user()->id;
                    $has_modality->save();
                }else{
                    $modality = new Matriculation();
                    $modality->modality_id = $item->modality_id;
                    $modality->total = $item->total;
                    $modality->matriculation_id = $matriculation_id;
                    $modality->price = $item->price;
                    $modality->iva = $system->iva;
                    $modality->client_id = $client_id;
                    $modality->discount = $item->discount;
                    $modality->user_id =  \Auth::user()->id;
                    $modality->save();
                }


            }
        }

        $matriculation = Matriculation::where('id',$matriculation_id)->first();
        $valor = Matriculation::select(\DB::raw('sum(total) as total, sum(discount) as discount'))->where(['matriculation_id'=>$matriculation_id,'status'=>1])->first();

        $matriculation->total = ($valor->total == null ? 0 : $valor->total);
        $matriculation->total_discount = ($valor->discount == null ? 0 : $valor->discount);

        if (Request::wantsJson() && $matriculation->save()){
            ///$message = trans('adminlte_lang::message.msg_update_success_matriculation');
            return ['id'=>$matriculation_id,'form'=>'matriculation'];
        }else{
            return redirect('matriculation');
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function report($id){
        $company = Company::first();
        $matriculation = Matriculation::where('id',$id)->first();
        return view('matriculation.report',compact('matriculation','company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generate_matriculation_payment(\Illuminate\Http\Request $request){
        $payment = new Payment();
        $matriculation = Matriculation::find($request->id);
        $payment->matriculation_id = $matriculation->id;
        $payment->branch_id = \Auth::user()->branch_id;
        $payment->user_id = \Auth::user()->id;
        $payment->total = $matriculation->total;

        if (Request::wantsJson() && $payment->save()){
            $message = trans('adminlte_lang::message.msg_success_approve_matriculation');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'matriculation', 'type'=>'success'];
        }else{
            return redirect('matriculation');
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function setup(){
        return view('matriculation.setup');
    }
}
