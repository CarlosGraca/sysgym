<?php

namespace App\Http\Controllers;

use App\Company;
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
        if (Request::ajax()) {
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
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            $image->move($path,$filename);
            
            //Image::make($image->getRealPath())->resize(300, 150)->save($path);

            $patient->avatar = 'uploads/' . $filename;

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
        
        if (Request::wantsJson()){
            return ['name'=>$patient->name,'mobile'=>$patient->mobile,'phone'=>$patient->phone,'has_secure'=>$patient->has_secure,'secure_card_id'=>$patient->secure_card_id,'email'=>$patient->email,'avatar'=>$patient->avatar];
        }else{
           return view('patients.show',compact('patient','Files'));
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

            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($patient->avatar && $patient->avatar != 'img/avatar.png'){
                if(file_exists($patient->avatar)){
                    unlink($patient->avatar);
                }
            }

            $image->move($path,$filename);
            
            //Image::make($image->getRealPath())->save($path);

            $patient->avatar = 'uploads/' . $filename;
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
     * @param  Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->status = 0;
        $deleted = $patient->save();
        session()->flash('flash_message','Tests was removed with success');
        if (Request::wantsJson()){
            return (string) $deleted;
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
}
