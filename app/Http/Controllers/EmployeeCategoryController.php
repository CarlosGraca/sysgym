<?php

namespace App\Http\Controllers;

use App\Models\EmployeeCategory;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\EmployeeCategoryRequest;

class EmployeeCategoryController extends Controller
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
        $categories = EmployeeCategory::where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])->get();
        return view('employees_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeCategoryRequest $request)
    {
        //
        $employees_category = new EmployeeCategory();
        $employees_category->name = $request->name;
        $employees_category->salary_base = $request->salary_base;

        $employees_category->user_id = Auth::user()->id;
        $employees_category->branch_id = Auth::user()->branch_id;
        $employees_category->tenant_id = Auth::user()->tenant_id;

        if (Request::wantsJson() && $employees_category->save()){
            $message = trans('adminlte_lang::message.msg_add_success_category');
            return ['employees_category'=>$employees_category,'message'=>$message,'form'=>'employees_category','type'=>'success'];
        }else{
            return view('employees_category.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  EmployeeCategory $employees_category
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeCategory $employees_category)
    {
        //
        return view('employees_category.show',compact('employees_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EmployeeCategory  $employees_category
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeCategory $employees_category)
    {
        return view('employees_category.edit',compact('employees_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeCategoryRequest  $request
     * @param  EmployeeCategory  $employees_category
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeCategoryRequest $request, EmployeeCategory $employees_category)
    {
        $employees_category->name = $request->name;
        $employees_category->salary_base = $request->salary_base;

        if (Request::wantsJson() && $employees_category->save()){
            $message = trans('adminlte_lang::message.msg_update_success_category');
            return ['employees_category'=>$employees_category,'message'=>$message,'form'=>'employees_category','type'=>'success'];
        }else{
            return view('employees_category.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $employees_category = EmployeeCategory::where('id',\Input::get('id'))->first();
        $employees_category->status = 0;

        if (Request::wantsJson() && $employees_category->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_category');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'employees_category', 'type'=>'success'];
        }else{
            return redirect('employees_category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $employees_category = EmployeeCategory::where('id',\Input::get('id'))->first();
        $employees_category->status = 1;

        if (Request::wantsJson() && $employees_category->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_category');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'employees_category', 'type'=>'success'];
        }else{
            return redirect('employees_category');
        }
    }


    public function getSalaryBase($id){
        $employees_category = EmployeeCategory::where("id",$id)->first();
        return $employees_category->salary_base;
    }


    public function getEmployeesCategory(){
        $default = new Defaults();
        $categories = EmployeeCategory::select(['id','name','salary_base'])->get();
        return json_encode($categories);
    }
}
