<?php

namespace App\Http\Controllers;

//use App\Island;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CompanyRequest;
use App\Models\Tenant;
use Request;
use Image;

class CompanyController extends Controller
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
        $company = Tenant::where('id', \Auth::user()->tenant_id)->first();

        if (Request::wantsJson()){
            return $company;
        }else{
            return view('company.index',compact('company'));
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
        return view('company.create',compact('island'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Tenant();
        $company->display_name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->fax = $request->fax;
        $company->nif = $request->nif;
        $company->zip_code = $request->zip_code;
        $company->owner = $request->owner;
        $company->area = $request->area;
        $company->city = $request->city;
        $company->website = $request->website;
        $company->facebook = $request->facebook;


        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            Image::make($image->getRealPath())->save($path);

            $company->logo = 'uploads/' . $filename;
        }

        $company->save();

        session()->flash('flash_message','Company was stored with success');

        if (Request::wantsJson()){
            return $company;
        }else{
            return redirect('company');
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
     * @param  Tenant  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $company)
    {
//        $island = Island::pluck('name','id');
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  Tenant  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Tenant $company)
    {
        $company->company_name = $request->name;
        $company->state = $request->state;
        $company->address_1 = $request->address_1;
        $company->address_2 = $request->address_2;
        $company->phone = $request->phone;
        $company->fax = $request->fax;
        $company->nif = $request->nif;
        $company->zip_code = $request->zip_code;
        $company->city = $request->city;
        $company->website = $request->website;
        $company->facebook = $request->facebook;

        if ($request->hasFile('logo')){

            $image = $request->file('logo');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($company->logo && $company->logo != 'img/round-logo.jpg'){
                if(file_exists($company->logo)){
                    unlink($company->logo);
                }
            }

            Image::make($image->getRealPath())->save($path);

            $company->logo = 'uploads/' . $filename;
        }

        //session()->flash('flash_message','Company was update with success');

        if (Request::wantsJson() && $company->save()){
            $message = trans('adminlte_lang::message.msg_success_company');
            return ['values'=>$company->name,'message'=>$message,'form'=>'company','type'=>'success'];
        }else{
            return redirect('company');
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
}
