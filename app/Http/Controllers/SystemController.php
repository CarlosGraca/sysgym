<?php

namespace App\Http\Controllers;

use App\System;
use App\TimeZone;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\SystemRequest;
use Request;
use Image;
use App\Http\Controllers\Defaults;

class SystemController extends Controller
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
        $default = new Defaults();
        $system = System::All()->first();
        $lang = $default->getLang();
        $timezone = $default->getTimezone();

        if (Request::wantsJson()){
            return $system;
        }else{
            return view('system.index',compact('system','lang','timezone'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $default = new Defaults();
        $theme = $default->getTheme();
        $lang = $default->getLang();
        $currency = $default->getCurrency();
        $layout = $default->getLayout();
//        $timezone = TimeZone::pluck('name','id');
        $timezone = $default->getTimezone();

        return view('system.create',compact('theme','layout','currency','lang','timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $system = new System();
        $system->name = $request->name;
        $system->currency = $request->currency;
        $system->lang = $request->lang;
        $system->theme = $request->theme;
        $system->layout = $request->layout;
        $system->save();

        session()->flash('flash_message','System was Saved with success');

        if (Request::wantsJson()){
            return $system;
        }else{
            return redirect('system');
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system_id = Crypt::decrypt($id);
        $system = System::where('id',$system_id)->first();
        
        $default = new Defaults();
        $theme = $default->getTheme();
        $lang = $default->getLang();
        $currency = $default->getCurrency();
        $layout = $default->getLayout();
//        $timezone = TimeZone::pluck('name','id');
        $timezone = $default->getTimezone();
        return view('system.edit',compact('theme','layout','currency','lang','system','timezone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SystemRequest  $request
     * @param  System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(SystemRequest $request, System $system)
    {
        $system->name = $request->name;
        $system->currency = $request->currency;
        $system->lang = $request->lang;
        $system->theme = $request->theme;
        $system->layout = $request->layout;
        $system->timezone = $request->timezone;

        if($request->status != ""){
            $system->status = $request->status;
        }
        
        if ($request->hasFile('background_image')){
            $image = $request->file('background_image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($system->background_image && $system->background_image != 'img/photo1.png'){
                if(file_exists($system->background_image)){
                    unlink($system->background_image);
                }
            }
            
            Image::make($image->getRealPath())->save($path);

            $system->background_image = 'uploads/' . $filename;

        }

        $system->save();

       // session()->flash('flash_message','System was updated with success');

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_system');
            return ['values'=>$system->name,'message'=>$message,'form'=>'system','type'=>'success','timezone'=>$system->timezone];
        }else{
            return redirect('system');
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

    /*public function setup(){
        $default = new Defaults();
        $system = \App\System::all()->first();
        $island = \App\Island::pluck('name','id');
        $theme = $default->getTheme();
        $lang = $default->getLang();
        $currency = $default->getCurrency();
        $layout = $default->getLayout();
        $timezone = TimeZone::pluck('name','id');

        return view('system.setup',compact('island','system','theme','lang','currency','layout','timezone'));
    }*/

    //ABOUT SYSTEM FUNCTION
    public function aboutSystem(){
        return view('system.about');
    }

    //HELP FUNCTION
    public function help(){
        return view('system.help');
    }
   /* 
    public function licenseExpired(){
        return view('license.expired');
    }*/
}
