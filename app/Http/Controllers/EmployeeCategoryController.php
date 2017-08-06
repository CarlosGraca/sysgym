<?php

namespace App\Http\Controllers;

use App\EmployeeCategory;
use App\System;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\CategoryRequest;

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
        $categories = EmployeeCategory::All();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $category = EmployeeCategory::create($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_add_success_category');
            return ['category'=>$category,'message'=>$message,'form'=>'category'];
        }else{
            return view('category.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeCategory $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, EmployeeCategory $category)
    {
        $category->update($request->all());

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_category');
            return ['category'=>$category,'message'=>$message,'form'=>'category'];
        }else{
            return view('category.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $category = EmployeeCategory::where('id',\Input::get('id'))->first();
        $category->status = 0;

        if (Request::wantsJson() && $category->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_category');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'category', 'type'=>'success'];
        }else{
            return redirect('category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $category = EmployeeCategory::where('id',\Input::get('id'))->first();
        $category->status = 1;

        if (Request::wantsJson() && $category->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_category');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'category', 'type'=>'success'];
        }else{
            return redirect('category');
        }
    }



    public function getSalaryBase($id){
        $category = EmployeeCategory::where("id",$id)->first();
        return $category->salary_base;
    }


    public function getEmployeesCategory(){
        $default = new Defaults();
        $categories = EmployeeCategory::select(['id','name','salary_base'])->get();
        //$categories = Category::select([ \DB::raw('id ,name, salary_base') ])->All();

        return json_encode($categories);

       // return ['number'=>$categories->id, 'name'=>$categories->name, 'value'=> $Defaults->currency($categories->salary_base)];
    }
}
