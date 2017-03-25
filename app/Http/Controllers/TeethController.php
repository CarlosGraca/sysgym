<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeethRequest;
use App\Teeth;
//use Illuminate\Http\Request;
use Request;

class TeethController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teeth = Teeth::all();
        return view('teeth.index',compact('teeth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teeth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeethRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeethRequest $request)
    {
        //
        $teeth = new Teeth();
        $teeth->name = $request->name;
        $teeth->number = $request->number;
        $teeth->user_id = $request->user_id;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'uploads/';
            $image->move($destinationPath,$filename);

            $teeth->avatar = 'uploads/'.$filename;
        }

        $teeth->save();


        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_create_success_teeth');
            return ['id'=>$teeth->id,'message'=>$message,'form'=>'teeth','type'=>'succeess'];
        }else{
            return redirect('teeth');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Teeth $teeth
     * @return \Illuminate\Http\Response
     */
    public function show(Teeth $teeth)
    {
        //
        return view('teeth.show',compact('teeth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teeth = Teeth::find($id);
//        print_r($teeth);
//        echo $id;
//        die();
        return view('teeth.edit',compact('teeth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeethRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeethRequest $request, $id)
    {
        $teeth = Teeth::find($id);
        $teeth->name = $request->name;
        $teeth->number = $request->number;
        $teeth->user_id = $request->user_id;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'uploads/';

            if($teeth->avatar && $teeth->avatar != 'img/clinic/doctor_icon.png'){
                if(file_exists($teeth->avatar)){
                    unlink($teeth->avatar);
                }
            }
            
            $image->move($destinationPath,$filename);

            $teeth->avatar = 'uploads/'.$filename;
        }

        $teeth->save();


        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_create_success_teeth');
            return ['id'=>$teeth->id,'message'=>$message,'form'=>'teeth','type'=>'succeess'];
        }else{
            return redirect('teeth');
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
        $teeth = Teeth::where('id',\Input::get('id'))->first();
        $teeth->status = 0;

        if (Request::wantsJson() && $teeth->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_teeth');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'teeth', 'type'=>'success'];
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
        $teeth = Teeth::where('id',\Input::get('id'))->first();
        $teeth->status = 1;

        if (Request::wantsJson() && $teeth->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_teeth');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'teeth'];
        }else{
            return redirect('teeth');
        }
    }
}
