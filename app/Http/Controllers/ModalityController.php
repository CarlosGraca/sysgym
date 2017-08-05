<?php

namespace App\Http\Controllers;

use App\Client;
use App\MatriculationModality;
use App\Modality;
use App\Schedule;
use App\System;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\ModalityRequest;

class ModalityController extends Controller
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
        $modalities = Modality::All();
        return view('modalities.index',compact('modalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $defaults = new Defaults();
        $weeks = $defaults->getWeeks();
        //ORDER BY FIELD(<fieldname>, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');

        $last_schedules = Schedule::select(['id'])->orderby('id','desc')->first();
        return view('modalities.create',compact('weeks','last_schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ModalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModalityRequest $request)
    {
//        $modality = Modality::create($request->all());
        $default = new Defaults();
        $modality = new Modality();
        $modality->name = $request->name;
        $modality->price = $request->price;
        $modality->user_id = \Auth::user()->id;

//        $currency_function = new Defaults();

        if ($request->hasFile('avatar')){
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);
            $modality->avatar = $filename;
        }

        if (Request::wantsJson() && $modality->save()){
            $message = trans('adminlte_lang::message.msg_add_success_modality');
            return ['id'=>$modality->id,'message'=>$message,'form'=>'modality','type'=>'success'];
        }else{
            return view('modalities.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(Modality $modality)
    {
        $currency_function = new Defaults();
        $system = System::all()->first();

        $schedules = Schedule::select( \DB::raw("week_day, start_time, end_time") )->where(['item_id'=>$modality->id,'status'=>1,'flag'=>2])
            ->orderby( \DB::raw(" field(week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'), start_time") )->get();

        $schedule_order = $schedules->toArray();

        $aux = ['monday'=>[],'tuesday'=>[],'wednesday'=>[],'thursday'=>[],'friday'=>[],'saturday'=>[],'sunday'=>[]];

        foreach ($schedule_order as $schedule) {
            array_push($aux[$schedule['week_day']], ['start_time'=>$schedule['start_time'], 'end_time'=>$schedule['end_time']]);
        }

        $max = 0;
        $max_name = '';

        array_walk($aux,function ($key, $value) use (&$max, &$max_name){
            if(count($key) > $max){
                $max = count($key);
                $max_name = $value;
            }
        });

        $total = doubleval($modality->price + (($system->iva / 100) * $modality->price));
        
        if (Request::wantsJson()){
            return ['name'=>$modality->name,'price'=>$total,'price_text'=>$currency_function->currency($total),'total'=>$total,'total_text'=>$currency_function->currency($total),'discount'=>0,'discount_text'=>$currency_function->currency(0),'iva'=>$system->iva];
        }else{
            return view('modalities.show',compact('modality','schedules','aux','max'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(Modality $modality)
    {
        $defaults = new Defaults();
        $weeks = $defaults->getWeeks();
        $last_schedules = Schedule::select(['id'])->orderby('id','desc')->first();
        $schedules = Schedule::where(['item_id'=>$modality->id,'status'=>1,'flag'=>2])
            ->orderby( \DB::raw(" field(week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'), start_time ") )->get();
        return view('modalities.edit',compact('modality','schedules','last_schedules','weeks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ModalityRequest  $request
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function update(ModalityRequest $request, Modality $modality)
    {
        $default = new Defaults();
        $modality->name = $request->name;
        $modality->price = $request->price;
        
//        $modality->update($request->all());

        if ($request->hasFile('avatar')){

            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);

            if($modality->avatar && $modality->avatar != 'img/clinic/doctor_icon.png'){
                if(file_exists($modality->avatar)){
                    unlink($modality->avatar);
                }
            }

            $modality->avatar = $filename;
        }

        if (Request::wantsJson() && $modality->save()){
            $message = trans('adminlte_lang::message.msg_update_success_modality');
            return ['values'=>$modality,'message'=>$message,'form'=>'modality','type'=>'success'];
        }else{
            return view('modalities.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $modality = Modality::where('id',\Input::get('id'))->first();
        $modality->status = 0;

        if (Request::wantsJson() && $modality->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_modality');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'modality', 'type'=>'success'];
        }else{
            return redirect('modalities');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $modality = Modality::where('id',\Input::get('id'))->first();
        $modality->status = 1;

        if (Request::wantsJson() && $modality->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_modality');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'modality'];
        }else{
            return redirect('modalities');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientModality(){
        $default = new Defaults();
        $modalities = MatriculationModality::select(\DB::raw('modalities.name as name, matriculation_modality.total as total, modality_id, matriculation_modality.price, matriculation_modality.iva, matriculation_modality.discount'))
            ->join('modalities', 'matriculation_modality.modality_id', '=', 'modalities.id')
            ->where(['matriculation_modality.client_id'=>\Input::get('id'), 'matriculation_modality.status'=>1])->get();

        $new_modalities = [];

        foreach ($modalities as $modality) {
            $name = $modality->name;
            $total = $modality->total;

            $modality_id = $modality->modality_id;
            $price = $modality->price;
            $iva = $modality->iva;
            $discount = $modality->discount;

            $price_text = $default->currency($price);
            $discount_text = $default->currency($discount);
            $total_text = $default->currency($total);
            $value_text = $default->currency(0);

            $m = ['name'=>$name, 'total'=>$total, 'total_text'=>$total_text, 'modality_id'=>$modality_id, 'value_text' => $value_text, 'price' => $price, 'price_text' => $price_text, 'iva'=>$iva, 'discount'=>$discount, 'discount_text' => $discount_text];
            $new_modalities[] = $m;

        }
//        print_r($new_modalities);
        if (Request::wantsJson()){
            return ['modalities' => $new_modalities];
         }else{
            return redirect('modalities');
        }
    }
}
