<?php

namespace App\Http\Controllers;

use App\Company;
use App\ConsultAgenda;
use App\File;
use App\Island;
use App\Patient;
use App\PatientFiles;
use App\SecureAgency;
use App\SecureCard;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
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
        $patients = Patient::all();

        if (Request::wantsJson()) {
            return $patients;
        } else {
            return view('patients.index',compact('patients'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $island = Island::pluck('name','id');
        $secure_agency = SecureAgency::pluck('name','id');
        if (\Request::ajax()) {
//            echo "AJAX";
//            die();
            return view('patients.create_ajax',compact('island','secure_agency'));
        }
        return view('patients.create',compact('island','secure_agency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PatientRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $default = new Defaults();
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->mobile = $request->mobile;
        $patient->nif = $request->nif;
        $patient->zip_code = $request->zip_code;
        $patient->genre = $request->genre;
        $patient->civil_state = $request->civil_state;
        $patient->island_id = $request->island_id;
        $patient->city = $request->city;
        $patient->website = $request->website;
        $patient->user_id = Auth::user()->id;
        $patient->work_address = $request->work_address;
        $patient->work_phone = $request->work_phone;
        $patient->profession = $request->profession;
        $patient->facebook = $request->facebook;
        $patient->nationality = $request->nationality;
        $patient->birthday = $request->birthday;
        $patient->parents = $request->parents;
        $patient->bi = $request->bi;
        $patient->has_secure = $request->has_secure;

        if ($request->hasFile('avatar')){
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);
            $patient->avatar = $filename;
        }

        if($request->has_secure == 1){
            $card = new SecureCard();
            $card->start_date = $request->start_date;
            $card->end_date = $request->end_date;
            $card->note = $request->note_card;
            $card->secure_number = $request->secure_number;
            $card->secure_agency_id = $request->secure_agency;
            $card->save();
            $patient->secure_card_id = $card->id;
        }

        $patient->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_patient');
            return ['id'=>$patient->id,'message'=>$message,'form'=>'patient'];
        }else{
             return view('patients');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $Files = File::where(['item_id'=>$patient->id,'flag'=>1])->get();
        $consult_agenda = ConsultAgenda::where('patient_id',$patient->id)->orderby('date','desc')->get();
        
        if (Request::wantsJson()){
            return ['name'=>$patient->name,'mobile'=>$patient->mobile,'phone'=>$patient->phone,'has_secure'=>$patient->has_secure,'secure_card_id'=>$patient->secure_card_id,'email'=>$patient->email,'avatar'=>$patient->avatar];
        }else{
           return view('patients.show',compact('patient','Files','consult_agenda'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $island = Island::pluck('name','id');
        $secure_agency = SecureAgency::pluck('name','id');
        $card = SecureCard::where('id',$patient->secure_card_id)->first();
        return view('patients.edit',compact('patient','island','card','secure_agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PatientRequest
     * @param  Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        //
        $default = new Defaults();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->mobile = $request->mobile;
        $patient->nif = $request->nif;
        $patient->zip_code = $request->zip_code;
        $patient->genre = $request->genre;
        $patient->civil_state = $request->civil_state;
        $patient->island_id = $request->island_id;
        $patient->city = $request->city;
        $patient->website = $request->website;
        $patient->user_id = Auth::user()->id;
        $patient->work_address = $request->work_address;
        $patient->work_phone = $request->work_phone;
        $patient->profession = $request->profession;
        $patient->facebook = $request->facebook;
        $patient->nationality = $request->nationality;
        $patient->birthday = $request->birthday;
        $patient->parents = $request->parents;
        $patient->bi = $request->bi;
        $patient->has_secure = $request->has_secure;



        if ($request->hasFile('avatar')){
            
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);

            if($patient->avatar && $patient->avatar != 'img/avatar.png'){
                if(file_exists($patient->avatar)){
                    unlink($patient->avatar);
                }
            }

            $patient->avatar = $filename;
        }

        $card = SecureCard::where('id',$patient->secure_card_id)->first();
        if(isset($card)){
            $card->start_date = $request->start_date;
            $card->end_date = $request->end_date;
            $card->note = $request->note_card;
            $card->secure_number = $request->secure_number;
            $card->secure_agency_id = $request->secure_agency;
            $card->save();
        }else{
            if($request->has_secure == 1){
                $card = new SecureCard();
                $card->start_date = $request->start_date;
                $card->end_date = $request->end_date;
                $card->note = $request->note_card;
                $card->secure_number = $request->secure_number;
                $card->secure_agency_id = $request->secure_agency;
                $card->save();
                $patient->secure_card_id = $card->id;
            }
        }

        $patient->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_patient');
            return ['values'=>$patient,'message'=>$message,'form'=>'patient'];
        }else{
             //return view('sheets.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        if(!$this->can_disable(\Input::get('id'))){
            $message = trans('adminlte_lang::message.msg_error_disable_patient');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'patient', 'type'=>'error'];
        }

        $patient = Patient::where('id',\Input::get('id'))->first();
        $patient->status = 0;

        if (Request::wantsJson() && $patient->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_patient');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'patient', 'type'=>'success'];
        }else{
            return redirect('patients');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $patient = Patient::where('id',\Input::get('id'))->first();
        $patient->status = 1;

        if (Request::wantsJson() && $patient->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_patient');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'patient'];
        }else{
            return redirect('patients');
        }
    }

    /**
     * Show the form for print PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function _print($id)
    {
        $patient = Patient::where('id',$id)->first();
        $company = Company::all()->first();

        $island = Island::pluck('name','id');
        $secure_agency = SecureAgency::pluck('name','id');
        $card = SecureCard::where('id',$patient->secure_card_id)->first();
        return view('report.profile_print',compact('patient','island','card','secure_agency','company'));
    }

    private function can_disable($id){

        $consult_agenda = \DB::select( \DB::raw("SELECT id FROM consult_agenda WHERE patient_id = $id AND status NOT IN (0,3) ") );

        if(count($consult_agenda) > 0){
            return false;
        }

        return true;

    }

    


}
