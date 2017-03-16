<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Patient;
use App\SecureAgency;
use App\Island;
use App\SecureCard;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\SecureAgencyRequest;

class SecureAgencyController extends Controller
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
        $secure_agency = SecureAgency::all();

        if (Request::wantsJson()) {
            return $secure_agency;
        } else {
            return view('secure_agency.index',compact('secure_agency'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $island = Island::all(['name'])->toArray();
        $island = array_prepend($island, ' (SELECT ISLAND) ');
        $island = array_flatten($island);
        return view('secure_agency.create',compact('island'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SecureAgencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecureAgencyRequest $request)
    {
        $agency = new SecureAgency();
        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->website = $request->website;
        $agency->island_id = $request->island;
        $agency->city = $request->city;
        $agency->zip_code = $request->zip_code;
        $agency->nif = $request->nif;
        $agency->facebook = $request->facebook;
        $agency->user_id = Auth::user()->id;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            Image::make($image->getRealPath())->save($path);

            $agency->avatar = 'uploads/' . $filename;

        }

        $agency->save();

        //session()->flash('flash_message','Company was stored with success');

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_create_agency');
            return ['values'=>$agency,'message'=>$message,'form'=>'agency'];
        }else{
            return redirect('secure_agency');
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
        $agency = SecureAgency::where('id',$id)->first();
        $insureds = SecureCard::where(['secure_agency_id'=>$id])->get();
        //$patients = Patient::where('secure_card_id','<>','0')->get();
        //$employees = Employee::where('secure_card_id','<>','0')->get();
        return view('secure_agency.show',compact('agency','insureds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = SecureAgency::where('id',$id)->first();
        $island = Island::pluck('name','id');

        return view('secure_agency.edit',compact('agency','island'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SecureAgencyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecureAgencyRequest $request, $id)
    {
        $agency = SecureAgency::where('id',$id)->first();
        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->website = $request->website;
        $agency->island_id = $request->island;
        $agency->city = $request->city;
        $agency->zip_code = $request->zip_code;
        $agency->nif = $request->nif;
        $agency->facebook = $request->facebook;
        $agency->user_id = Auth::user()->id;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($agency->avatar &&  $agency->avatar != 'img/round-logo.jpg'){
                if(file_exists($agency->avatar)){
                    unlink($agency->avatar);
                }
            }

            Image::make($image->getRealPath())->save($path);

            $agency->avatar = 'uploads/' . $filename;

        }

        $agency->save();

        //session()->flash('flash_message','Company was stored with success');

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_update_agency');
            return ['values'=>$agency->name,'message'=>$message,'form'=>'agency'];
        }else{
            return redirect('secure_agency');
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
