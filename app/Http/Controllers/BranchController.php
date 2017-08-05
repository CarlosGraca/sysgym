<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Island;
use App\Schedule;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
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
        $branches = Branch::all();

        if (Request::wantsJson()) {
            return $branches;
        } else {
            return view('branches.index',compact('branches'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaults = new Defaults();
        $island = Island::pluck('name','id');
        $weeks = $defaults->getWeeks();
        $last_schedules = Schedule::select(['id'])->orderby('id','desc')->first();

        return view('branches.create',compact('island','weeks','last_schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $company = Company::All()->first();
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;
        $branch->manager = $request->manager;
        $branch->island_id = $request->island;
        $branch->city = $request->city;
        $branch->company_id = $company->id;
        $branch->user_id = Auth::user()->id;

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'uploads/';
            $image->move($destinationPath,$filename);

            $company->logo = 'uploads/' . $filename;
        }

        $branch->save();


        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_create_success_branches');
            return ['id'=>$branch->id,'message'=>$message,'form'=>'branches'];
        }else{
            return redirect('branches');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $schedules = Schedule::select( \DB::raw("week_day, start_time, end_time") )->where(['item_id'=>$branch->id,'status'=>1,'flag'=>1])
            ->orderby( \DB::raw(" field(week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'), start_time") )->get();
        //ORDER BY FIELD(<fieldname>, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');
        $company = Company::all()->first();

        $schedule_order = $schedules->toArray();

        $aux = ['monday'=>[],'tuesday'=>[],'wednesday'=>[],'thursday'=>[],'friday'=>[],'saturday'=>[],'sunday'=>[]];

        foreach ($schedule_order as $schedule) {
            array_push($aux[$schedule['week_day']], ['start_time'=>$schedule['start_time'], 'end_time'=>$schedule['end_time']]);
        }

        $max = 0;
        $max_name = '';

        array_walk($aux,function ($key, $value) use (&$max, &$max_name){
            if(count($key) > $max){
                $max = count($key);
                $max_name = $value;
            }
        });

        return view('branches.show',compact('branch','schedules','company','aux','max'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $defaults = new Defaults();
        $weeks = $defaults->getWeeks();
        $island = Island::pluck('name','id');
        $schedules = Schedule::where(['item_id'=>$branch->id,'status'=>1,'flag'=>1])
            ->orderby( \DB::raw(" field(week_day,'monday','tuesday','wednesday','thursday','friday','saturday','sunday'), start_time ") )->get();
        //ORDER BY FIELD(<fieldname>, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');


        $last_schedules = Schedule::select(['id'])->orderby('id','desc')->first();

        return view('branches.edit',compact('branch','island','weeks','schedules','last_schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BranchRequest $request
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;
        $branch->manager = $request->manager;
        $branch->island_id = $request->island;
        $branch->city = $request->city;
        $branch->user_id = Auth::user()->id;

        if ($request->hasFile('avatar')){

            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = 'uploads/';

            if($branch->avatar && $branch->avatar != 'img/round-logo.jpg'){
                if(file_exists($branch->avatar)){
                    unlink($branch->avatar);
                }
            }

            $image->move($path,$filename);
            $branch->avatar = 'uploads/' . $filename;
        }

        $branch->save();

        //session()->flash('flash_message','Company was stored with success');

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_update_success_branches');
            return ['id'=>$branch->id,'message'=>$message,'form'=>'branches'];
        }else{
            return redirect('branches');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $branch = Branch::where('id',\Input::get('id'))->first();
        $branch->status = 0;

        if (Request::wantsJson() && $branch->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_branch');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'branch', 'type'=>'success'];
        }else{
            return redirect('branches');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $branch = Branch::where('id',\Input::get('id'))->first();
        $branch->status = 1;

        if (Request::wantsJson() && $branch->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_branch');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'branch', 'type'=>'success'];
        }else{
            return redirect('branches');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function schedule(\Illuminate\Http\Request $request)
    {
        $schedules = json_decode($request->schedule);
        $delete = json_decode($request->delete);
        $item_id = $request->item_id;
        $flag = $request->flag;

        if (is_array($delete)){
            foreach ($delete as $item) {
                $has_schedule = Schedule::where('id', $item)->first();
                if($has_schedule){
                    $has_schedule->delete();
//                    $has_schedule->status = 0;
//                    $has_schedule->save();
                }
            }
        }

        if (is_array($schedules)){
            foreach ($schedules as $item) {

                $has_schedule = Schedule::where('id',$item->id)->first();

                if($has_schedule){
                    $has_schedule->week_day = $item->week_day;
                    $has_schedule->start_time = $item->start_time;
                    $has_schedule->end_time = $item->end_time;
                    $has_schedule->item_id = $item_id;
                    $has_schedule->user_id =  Auth::user()->id;
                    $has_schedule->flag = $flag;
                    $has_schedule->save();
                }else{
                    $schedule = new Schedule();
                    $schedule->week_day = $item->week_day;
                    $schedule->start_time = $item->start_time;
                    $schedule->end_time = $item->end_time;
                    $schedule->item_id = $item_id;
                    $schedule->user_id =  Auth::user()->id;
                    $schedule->flag = $flag;
                    $schedule->save();
                }


            }
        }

        if (Request::wantsJson()){
            ///$message = trans('adminlte_lang::message.msg_update_success_branches');
            return ['id'=>$item_id,'form'=>'branches'];
        }else{
            return redirect('branches');
        }
    }

    function flipAndGroup($input) {
        $outArr = array();
        array_walk($input, function($value, $key) use (&$outArr) {
            if(!isset($outArr[$value]) || !is_array($outArr[$value])) {
                $outArr[$value] = [];
            }
            $outArr[$value][] = $key;
        });
        return $outArr;
    }
}
