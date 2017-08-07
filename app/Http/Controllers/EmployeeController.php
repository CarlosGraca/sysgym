<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\EmployeeCategory;
use App\Models\Tenant;
use App\Models\File;
use App\Models\Employee;
use App\User;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
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
        $employees = Employee::where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])->get();

        if (Request::wantsJson()) {
            return $employees;
        } else {
            return view('employees.index',compact('employees'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //BRANCHES ARRAY DATA TO SELECT
        $branches = Branch::pluck('name','id');

        //CATEGORY ARRAY DATA TO SELECT
        $category = EmployeeCategory::pluck('name','id');

        if (Request::ajax()) {
            return view('employees.create_ajax',compact('branches','category'));
        }
        return view('employees.create',compact('branches','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $default = new Defaults();
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->mobile = $request->mobile;
        $employee->nif = $request->nif;
        $employee->zip_code = $request->zip_code;
        $employee->genre = $request->genre;
        $employee->civil_state = $request->civil_state;
        $employee->city = $request->city;
        $employee->website = $request->website;
        $employee->salary = $request->salary;
        $employee->start_work = $request->start_work;
        $employee->end_work = $request->end_work;
        $employee->category_id = $request->employee_category_id;
        $employee->note = $request->note;
        $employee->facebook = $request->facebook;
        $employee->nationality = $request->nationality;
        $employee->birthday = $request->birthday;
        $employee->parents = $request->parents;
        $employee->bi = $request->bi;

        $employee->user_id = Auth::user()->id;
        $employee->branch_id = Auth::user()->branch_id;
        $employee->tenant_id = Auth::user()->tenant_id;

//        $employee->branch_id = $request->branch;

        if ($request->hasFile('avatar') || $request->avatar_type == 'capture'){
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);
            $employee->avatar = $filename;
        }

        if (Request::wantsJson() && $employee->save()){
            $message = trans('adminlte_lang::message.msg_add_success_employee');
            return ['values'=>$employee->name,'message'=>$message,'form'=>'employee','type'=>'success'];
        }else{
            //return view('employees.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $Files = File::where(['item_id'=>$employee->id,'flag'=>2])->get();

        if (Request::wantsJson()){
            return ['name'=>$employee->name,'mobile'=>$employee->mobile,'phone'=>$employee->phone,'email'=>$employee->email];
        }elseif (Request::Ajax()){
            return view('people.show_ajax',['people'=>$employee, 'type_people'=>'employee']);
        }
        else{
            return view('employees.show',compact('employee','Files'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
       //BRANCHES ARRAY DATA TO SELECT
        $branches = Branch::pluck('name','id');

        //CATEGORY ARRAY DATA TO SELECT
        $category = EmployeeCategory::pluck('name','id');

        return view('employees.edit',compact('branches','category','employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $default = new Defaults();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->mobile = $request->mobile;
        $employee->nif = $request->nif;
        $employee->zip_code = $request->zip_code;
        $employee->genre = $request->genre;
        $employee->civil_state = $request->civil_state;
        $employee->city = $request->city;
        $employee->website = $request->website;
        $employee->salary = $request->salary;
        $employee->start_work = $request->start_work;
        $employee->end_work = $request->end_work;
        $employee->category_id = $request->employee_category_id;
        $employee->note = $request->note;
        $employee->facebook = $request->facebook;
        $employee->nationality = $request->nationality;
        $employee->birthday = $request->birthday;
        $employee->parents = $request->parents;
        $employee->bi = $request->bi;


        if ($request->hasFile('avatar')  || $request->avatar_type == 'capture'){

            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);


            if($employee->avatar && $employee->avatar != 'img/avatar.png'){
                if(file_exists($employee->avatar)){
                    unlink($employee->avatar);
                }
            }

            $employee->avatar = $filename;
        }

        if (Request::wantsJson() && $employee->save()){
            $message = trans('adminlte_lang::message.msg_update_success_employee');
            return ['values'=>$employee->id,'message'=>$message,'form'=>'employee','type'=>'success'];
        }else{
            return view('employees.create');
        }
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
//        if(!$this->can_disable(\Input::get('id'))){
//            $message = trans('adminlte_lang::message.msg_error_disable_employee');
//            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'employee', 'type'=>'error'];
//        }

        $employee = Employee::where('id',\Input::get('id'))->first();
        $employee->status = 0;

        if (Request::wantsJson() && $employee->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_employee');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'employee', 'type'=>'success'];
        }else{
            return redirect('employees');
        }
    }

    /**
     * Enable the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $employee = Employee::where('id',\Input::get('id'))->first();
        $employee->status = 1;

        if (Request::wantsJson() && $employee->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_employee');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'employee','type'=>'success'];
        }else{
            return redirect('employees');
        }
    }

    public function getEmployee($id){
        $employee = Employee::select(['name','email'])->where('id',$id)->first();
        return $employee;
    }

    public function UserAccountExist($id){
        $user = User::where('employee_id',$id)->first();
        if ($user != null){
            return true;
        }
        return false;
    }


    private function can_disable($id){

        $consult_agenda = \DB::select( \DB::raw("SELECT id FROM consult_agenda WHERE consult_agenda.doctor_id = $id AND status NOT IN (0,3) ") );

        if(count($consult_agenda) > 0){
            return false;
        }

        return true;

    }

    /**
     * Show the form for print PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function _print($id)
    {
        $employee = Employee::where('id',$id)->first();
        $company = Company::all()->first();
        return view('report.profile_print',['people'=>$employee, 'company'=> $company , 'type_people' => 'employee']);
    }
}
