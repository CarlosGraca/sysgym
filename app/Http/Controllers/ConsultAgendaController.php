<?php

namespace App\Http\Controllers;

use App\ConsultAgenda;
use App\ConsultType;
use App\Employee;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Http\Requests\ConsultAgendaRequest;

class ConsultAgendaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_agenda');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consult_agenda = ConsultAgenda::select(['consult_agenda.id','consult_agenda.status as status','consult_type.name as type','consult_agenda.date','consult_agenda.start_time as starttime','consult_agenda.end_time as endtime','employees.name as doctor','patients.name as patient','patients.mobile as mobile','patients.phone as phone','patients.email as email','patients.id as patient_id','patients.avatar as patient_avatar','employees.id as doctor_id','users.name as user_name'])
            ->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')
            ->join('consult_type', 'consult_agenda.consult_type_id', '=', 'consult_type.id')
            ->join('employees', 'consult_agenda.doctor_id', '=', 'employees.id')
            ->join('users', 'users.id', '=', 'consult_agenda.user_id')
            ->where('consult_agenda.branch_id',Auth::user()->logged_branch)->orderby('consult_agenda.date','asc')->get();
        return view('consult_agenda.index',compact('consult_agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = Employee::where('doctor',1)->pluck('name','id');
        $patients = Patient::where('status',1)->pluck('name','id');
        $consult_type = ConsultType::pluck('name','id');

        return view('consult_agenda.create',compact('doctor','patients','consult_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConsultAgendaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultAgendaRequest $request)
    {

        $total = $this->validateConsultAgenda($request->startTime, $request->date, $request->endTime, 0, $request->doctor_id);
        if($total > 0){
            $message = trans('adminlte_lang::message.msg_update_error_consult_agenda');
            return ['values'=>null,'message'=>$message,'form'=>'consult_agenda','type'=>'error'];
        }else{
            $consult_agenda = ConsultAgenda::create($request->all());
        }

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_consult_agenda');
            return ['values'=>$consult_agenda,'message'=>$message,'form'=>'consult_agenda'];
        }else{
            return view('consult_agenda.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ConsultAgenda $consult_agenda
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultAgenda $consult_agenda)
    {
        //
        return view('consult_agenda.show',compact('consult_agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ConsultAgenda $consult_agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultAgenda $consult_agenda)
    {
        $doctor = Employee::where('doctor',1)->pluck('name','id');
        $patients = Patient::where('status',1)->pluck('name','id');
        $consult_type = ConsultType::pluck('name','id');

        return view('consult_agenda.edit',compact('doctor','patients','consult_type','consult_agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultAgendaRequest $request, ConsultAgenda $consult_agenda)
    {
        $total = $this->validateConsultAgenda($request->start_time, $request->date, $request->end_time, $consult_agenda->id, $consult_agenda->doctor_id);

        if($total > 0){
            $message = trans('adminlte_lang::message.msg_update_error_consult_agenda');
            return ['values'=>$consult_agenda->date,'message'=>$message,'form'=>'consult_agenda','type'=>'error'];
        }

        $consult_agenda->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_consult_agenda');
            return ['values'=>$consult_agenda,'message'=>$message,'form'=>'consult_agenda'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultAgenda $consult_agenda)
    {
        $consult_agenda->status = 0;
        $consult_agenda->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_consult_agenda');
            return ['values'=>$consult_agenda->name,'message'=>$message,'form'=>'consult_agenda'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    //THIS FUNCTION RETURN ALL DATA FROM CONSULT AGENDA TO SHOW ON CALENDAR ".trans('adminlte_lang::message.patient').":
    //CONCAT(' ',patients.name,' | ".trans('adminlte_lang::message.contacts').": ',patients.mobile,' / ',patients.phone, ' | ".trans('adminlte_lang::message.email').": ',patients.email)
    public function getAllConsultAgenda(){
        $consult_agenda = ConsultAgenda::select([\DB::raw("patients.name as title"),\DB::raw("CONCAT(date,'T',start_time) as start"),\DB::raw("CONCAT(date,'T',end_time) as end"),'consult_agenda.id',
            \DB::raw("
             CASE  
              WHEN consult_agenda.status = 0 THEN 'red'
              WHEN consult_agenda.status = 1 THEN '#00c0ef'
              WHEN consult_agenda.status = 2 THEN 'green'
              WHEN consult_agenda.status = 3 THEN 'gray'
             END as backgroundColor,
             CASE  
              WHEN consult_agenda.status = 0 THEN false
              WHEN consult_agenda.status = 1 THEN true
              WHEN consult_agenda.status = 2 THEN false
              WHEN consult_agenda.status = 3 THEN false
             END as editable,
              CASE  
              WHEN consult_agenda.status = 0 THEN 'event_canceled'
              WHEN consult_agenda.status = 1 THEN 'event_scheduled'
              WHEN consult_agenda.status = 2 THEN 'event_confirmed'
              WHEN consult_agenda.status = 3 THEN 'event_expired'
             END as className,
             patients.id as patient_id,
             'white' as textColor,
             'white' as borderColor,
             consult_agenda.date as date,
             false as allDay
            ")
        ])->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')->where('branch_id',Auth::user()->logged_branch)->get();
        echo json_encode($consult_agenda);
    }

    public function updateConsultAgenda(Request $request){

        $consult_agenda = ConsultAgenda::where('id',\Input::get('id'))->first();
        $consult_agenda->date = \Input::get('date');
        $consult_agenda->start_time = \Input::get('start_time');
        $consult_agenda->end_time = \Input::get('end_time');
        $startTime = \Input::get('start_time');
        $endTime =  \Input::get('end_time');
        $date = \Input::get('date');

        $total = $this->validateConsultAgenda($startTime, $date, $endTime, $consult_agenda->id, $consult_agenda->doctor_id);

        if($total > 0){
            $message = trans('adminlte_lang::message.msg_update_error_consult_agenda');
            return ['values'=>$consult_agenda->date,'message'=>$message,'form'=>'consult_agenda','type'=>'error'];
        }else{
            $consult_agenda->save();
        }

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_consult_agenda');
            return ['values'=>$consult_agenda->date,'message'=>$message,'form'=>'consult_agenda'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    public function getTableData(){
        $consult_agenda = ConsultAgenda::select(['consult_agenda.id','consult_agenda.status as status','consult_type.name as type','consult_agenda.date','consult_agenda.start_time as starttime','consult_agenda.end_time as endtime','employees.name as doctor','patients.name as patient','patients.mobile as mobile','patients.phone as phone','patients.email as email','patients.id as patient_id','employees.id as doctor_id'])
            ->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')
            ->join('consult_type', 'consult_agenda.consult_type_id', '=', 'consult_type.id')
            ->join('employees', 'consult_agenda.doctor_id', '=', 'employees.id')
            ->where('consult_agenda.branch_id',Auth::user()->logged_branch)->orderby('consult_agenda.date','asc')->get();

       return ['data'=>$consult_agenda];
    }


    private function validateConsultAgenda($startTime, $date, $endTime, $id = 0, $doctor){

        $results = \DB::select( \DB::raw("SELECT COUNT(*) as t FROM consult_agenda WHERE date = '$date' AND (
                    ('$startTime' >  start_time OR '$endTime' > start_time) AND ('$startTime' <  end_time OR '$endTime' < end_time)
                ) AND ".($id == 0 ? " " : " id <> $id AND ")."consult_agenda.status IN (1,2,3) AND doctor_id = $doctor"));
        $results = json_decode(json_encode($results), true);
        $total = $results[0]['t'];
        return $total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $consult_agenda = ConsultAgenda::where('id',\Input::get('id'))->first();
        $consult_agenda->status = 2;

        if (Request::wantsJson() && $consult_agenda->save()){
            $message = trans('adminlte_lang::message.msg_confirm_success_consult_agenda');
            return ['values'=>$consult_agenda->note,'message'=>$message,'form'=>'consult_agenda','type'=>'success'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request)
    {
        $consult_agenda = ConsultAgenda::where('id',\Input::get('id'))->first();
        $consult_agenda->status = 0;

        if (Request::wantsJson() && $consult_agenda->save()){
            $message = trans('adminlte_lang::message.msg_cancel_success_consult_agenda');
            return ['values'=>$consult_agenda->note,'message'=>$message,'form'=>'consult_agenda','type'=>'success'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function re_agenda(Request $request)
    {
        $consult_agenda = ConsultAgenda::where('id',\Input::get('id'))->first();
        $consult_agenda->status = 1;
        $consult_agenda->date = \Input::get('date');

        if (Request::wantsJson() && $consult_agenda->save()){
            $message = trans('adminlte_lang::message.msg_re_agenda_success_consult_agenda');
            return ['values'=>$consult_agenda->note,'message'=>$message,'form'=>'consult_agenda','type'=>'success'];
        }else{
            return view('consult_agenda.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm_consult_list()
    {

        $today = date_create();
        $agenda = ConsultAgenda::select(['consult_agenda.id','consult_agenda.status as status','consult_type.name as type','consult_agenda.date','consult_agenda.start_time as starttime','consult_agenda.end_time as endtime','consult_agenda.status as status','employees.name as doctor','patients.name as patient','patients.mobile as mobile','patients.phone as phone','patients.email as email','patients.id as patient_id','patients.avatar as patient_avatar','employees.id as doctor_id','users.name as user_name'])
            ->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')
            ->join('consult_type', 'consult_agenda.consult_type_id', '=', 'consult_type.id')
            ->join('employees', 'consult_agenda.doctor_id', '=', 'employees.id')
            ->join('users', 'users.id', '=', 'consult_agenda.user_id')
            ->where('consult_agenda.branch_id',\Auth::user()->logged_branch)
            ->where('consult_agenda.date','=',$today->format('Y-m-d'))
            ->where('consult_agenda.status','=',1)
            ->orderby('consult_agenda.start_time','desc')
            ->get();

        //die($today);

        return view('consult_agenda.confirm_consult_list',compact('agenda'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel_consult_list()
    {
        $canceled = ConsultAgenda::select(['consult_agenda.id','consult_agenda.status as status','consult_type.name as type','consult_agenda.date','consult_agenda.start_time as starttime','consult_agenda.end_time as endtime','consult_agenda.status as status','employees.name as doctor','patients.name as patient','patients.mobile as mobile','patients.phone as phone','patients.email as email','patients.id as patient_id','patients.avatar as patient_avatar','employees.id as doctor_id','users.name as user_name'])
            ->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')
            ->join('consult_type', 'consult_agenda.consult_type_id', '=', 'consult_type.id')
            ->join('employees', 'consult_agenda.doctor_id', '=', 'employees.id')
            ->join('users', 'users.id', '=', 'consult_agenda.user_id')
            ->where('consult_agenda.branch_id',\Auth::user()->logged_branch)
            ->where('consult_agenda.status','=',0)->orderby('consult_agenda.start_time','desc')->get();

        return view('consult_agenda.cancel_consult_list',compact('canceled'));
    }
}
