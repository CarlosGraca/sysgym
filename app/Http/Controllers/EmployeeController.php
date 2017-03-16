<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\File;
use App\Island;
use App\Employee;
use App\SecureAgency;
use App\SecureCard;
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
        $employees = Employee::all();

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
        //ISLAND ARRAY DATA TO SELECT
        $island = Island::pluck('name','id');

        //BRANCHES ARRAY DATA TO SELECT
        $branches = Branch::pluck('name','id');

        //CATEGORY ARRAY DATA TO SELECT
        $category = Category::pluck('name','id');

        //SECURITY AGENCY ARRAY DATA TO SELECT
        $secure_agency = SecureAgency::pluck('name','id');

        if (Request::ajax()) {
            return view('employees.create_ajax',compact('island','branches','category','secure_agency'));
        }
        return view('employees.create',compact('island','branches','category','secure_agency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
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
        $employee->island_id = $request->island_id;
        $employee->city = $request->city;
        $employee->website = $request->website;
        $employee->user_id = Auth::user()->id;
        $employee->salary = $request->salary;
        $employee->start_work = $request->start_work;
        $employee->end_work = $request->end_work;
        $employee->branch_id = $request->branch;
        $employee->category_id = $request->category;
        $employee->note = $request->note;
        $employee->facebook = $request->facebook;
        $employee->nationality = $request->nationality;
        $employee->birthday = $request->birthday;
        $employee->parents = $request->parents;
        $employee->bi = $request->bi;
        $employee->doctor = $request->doctor_check;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            //Image::make($image->getRealPath())->resize(200, 200)->save($path);

            $image->move($path,$filename);

            $employee->avatar = 'uploads/' . $filename;

        }

        $employee->has_secure = $request->has_secure;

        if($request->has_secure == 1){
            $card = new SecureCard();
            $card->start_date = $request->start_date;
            $card->end_date = $request->end_date;
            $card->note = $request->note_card;
            $card->secure_number = $request->secure_number;
            $card->secure_agency_id = $request->secure_agency;
            $card->save();
            $employee->secure_card_id = $card->id;
        }

        $employee->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_employee');
            return ['values'=>$employee->name,'message'=>$message,'form'=>'employee'];
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
            return ['name'=>$employee->name,'mobile'=>$employee->mobile,'phone'=>$employee->phone,'has_secure'=>$employee->has_secure,'secure_card_id'=>$employee->secure_card_id,'email'=>$employee->email];
        }else{
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
        //ISLAND ARRAY DATA TO SELECT
        $island = Island::pluck('name','id');

        //BRANCHES ARRAY DATA TO SELECT
        $branches = Branch::pluck('name','id');

        //CATEGORY ARRAY DATA TO SELECT
        $category = Category::pluck('name','id');

        //SECURITY AGENCY ARRAY DATA TO SELECT
        $secure_agency = SecureAgency::pluck('name','id');

        $card = SecureCard::where('id',$employee->secure_card_id)->first();

        return view('employees.edit',compact('island','branches','category','secure_agency','employee','card'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->mobile = $request->mobile;
        $employee->nif = $request->nif;
        $employee->zip_code = $request->zip_code;
        $employee->genre = $request->genre;
        $employee->civil_state = $request->civil_state;
        $employee->island_id = $request->island_id;
        $employee->city = $request->city;
        $employee->website = $request->website;
        $employee->user_id = Auth::user()->id;
        $employee->salary = $request->salary;
        $employee->start_work = $request->start_work;
        $employee->end_work = $request->end_work;
        $employee->branch_id = $request->branch;
        $employee->category_id = $request->category;
        $employee->note = $request->note;
        $employee->facebook = $request->facebook;
        $employee->nationality = $request->nationality;
        $employee->birthday = $request->birthday;
        $employee->parents = $request->parents;
        $employee->bi = $request->bi;
        $employee->doctor = $request->doctor_check;

        $employee->has_secure = $request->has_secure;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);


            if($employee->avatar && $employee->avatar != 'img/avatar.png'){
                if(file_exists($employee->avatar)){
                    unlink($employee->avatar);
                }
            }

            //Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $image->move($path,$filename);

            $employee->avatar = 'uploads/' . $filename;
            $user = User::where('employee_id',$employee->id)->first();

            if (isset($user)){
                $user->avatar = 'uploads/' . $filename;
                $user->save();
            }
        }

        $employee->has_secure = $request->has_secure;

        $card = SecureCard::where('id',$employee->secure_card_id)->first();
        if(isset($card)){
            $card->start_date = $request->start_date;
            $card->end_date = $request->end_date;
            $card->note = $request->note_card;
            $card->secure_agency_id = $request->secure_agency;
            $card->secure_number = $request->secure_number;
            $card->save();
        }else{
            if($request->has_secure == 1){
                $card = new SecureCard();
                $card->start_date = $request->start_date;
                $card->end_date = $request->end_date;
                $card->note = $request->note_card;
                $card->secure_agency_id = $request->secure_agency;
                $card->secure_number = $request->secure_number;
                $card->save();
                $employee->secure_card_id = $card->id;
            }
        }



        $employee->save();


        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_employee');
            return ['values'=>$employee->id,'message'=>$message,'form'=>'employee'];
        }else{
            //return view('employees.create');
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
}
