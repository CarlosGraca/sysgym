<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\ConsultAgenda;
use App\Http\Requests;
use App\System;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','check_agenda']);
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $system = System::all()->first();
        \App::setLocale($system->lang);


        if($system->status == '2'){
            return redirect('setup/system');
        }elseif ($system->status == '0'){
            return redirect('license_expired');
        }

        $today = date_create();
        $recent_users = User::select(['name','created_at','avatar','employee_id'])->orderby('created_at','desc')->limit(8)->get();
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

        $canceled = ConsultAgenda::select(['consult_agenda.id','consult_agenda.status as status','consult_type.name as type','consult_agenda.date','consult_agenda.start_time as starttime','consult_agenda.end_time as endtime','consult_agenda.status as status','employees.name as doctor','patients.name as patient','patients.mobile as mobile','patients.phone as phone','patients.email as email','patients.id as patient_id','patients.avatar as patient_avatar','employees.id as doctor_id','users.name as user_name'])
            ->join('patients', 'consult_agenda.patient_id', '=', 'patients.id')
            ->join('consult_type', 'consult_agenda.consult_type_id', '=', 'consult_type.id')
            ->join('employees', 'consult_agenda.doctor_id', '=', 'employees.id')
            ->join('users', 'users.id', '=', 'consult_agenda.user_id')
            ->where('consult_agenda.branch_id',\Auth::user()->logged_branch)
            ->where('consult_agenda.status','=',0)->orderby('consult_agenda.start_time','desc')->get();



        return view('home',compact('recent_users','agenda','canceled'));
    }
}
