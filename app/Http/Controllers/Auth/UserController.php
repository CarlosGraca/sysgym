<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Defaults;
use App\Http\Controllers\SendMailController;
use App\Http\Requests\UserRequest;
use App\Models\BranchPermission;
use App\Models\Employee;
use App\Models\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use \Illuminate\Http\Request;
//use Image;
use Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where(['tenant_id'=>\Auth::user()->tenant_id])->get();

        if (\Request::wantsJson()) {
            return $users;
        } else {
            return view('users.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where(['tenant_id'=>\Auth::user()->tenant_id])->pluck('display_name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $default = new Defaults();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = bcrypt($request->password);
        $user->tenant_id = \Auth::user()->tenant_id;
        $user->token = str_random(25);


        //$data = $this->create_user($request->all())->toArray();
        $data = [];
        $data['token'] = $user->token;
        $data['name'] = $user->name;
        $data['email'] = $user->email;


        $branches = $request->get('branches');


        if ($request->hasFile('avatar') || $request->avatar_type == 'capture'){
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);

            $user->avatar = $filename;
        }


        if(\Request::wantsJson()  && $user->save()){

            if(count($branches) > 0){
                foreach ($branches as $branch) {
                    BranchPermission::create(['branch_id'=>$branch,'user_id'=>$user->id,'tenant_id' =>$user->tenant_id]);
                }
            }


            \Mail::send('auth.mails.confirmation', $data, function($message) use($data) {
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });

            $url = route('users.edit',$user->id);

//            \Auth::login($user, true);
            $message = trans('adminlte_lang::message.msg_add_success_user');
            return ['values'=>$user->name,'message'=>$message,'form'=>'user','type'=>'success', 'url' => $url];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles = Role::where(['tenant_id'=>\Auth::user()->tenant_id])->pluck('display_name','id');
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param   User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,  User $user)
    {
        $default = new Defaults();

        $branches = $request->get('branches');

        $branchPermission = BranchPermission::where(['user_id'=>$user->id,'tenant_id'=>$user->tenant_id])->get();

        if(count($branchPermission) > 0){
            foreach ($branchPermission as $item) {
                $item->delete();
            }
        }
        if(count($branches) > 0){
            foreach ($branches as $branch) {
                BranchPermission::create(['branch_id'=>$branch,'user_id'=>$user->id,'tenant_id' =>$user->tenant_id]);
            }
        }
       
        if ($request->hasFile('avatar')){

            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);

            if($user->avatar && $user->avatar != 'img/avatar.png'){
                if(file_exists($user->avatar)){
                    unlink($user->avatar);
                }
            }

            $user->avatar = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;


        if (\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_update_success_user');
            return ['values'=>$user->name,'message'=>$message,'form'=>'user','type'=>'success'];
        }else{
            return view('users.edit');
        }
    }

    /**
     * Disable the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {

        if(\Input::get('id') == Auth::user()->id){
            $message = trans('adminlte_lang::message.msg_error_disable_user');
            return ['message'=>$message,'form'=>'user','type'=>'error'];
        }

        $user = User::where('id',\Input::get('id'))->first();
        $user->status = 0;

        if (\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_user');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'user'];
        }else{
            return redirect('users');
        }
    }

    /**
     * Enable the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $user = User::where('id',\Input::get('id'))->first();
        $user->status = 1;

        if (\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_user');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'user'];
        }else{
            return redirect('users');
        }
    }

    /**
     * build a new system user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function build($id){
        $employee = Employee::where('id',$id)->first();
        $default = new Defaults();
        $mail = new SendMailController();
        $user = new User();

        $password = $default->generateRandomString();

        $user->name = $employee->name;
        $user->email = $employee->email;
        $user->password = bcrypt($password);
        $user->employee_id = $employee->id;
        $user->avatar = $employee->avatar;
        $user->status = 2;

        $send = $mail->sendMail(
            ['You\'re receive this email with your reset password.'],
            ['This password was generated by our system.'],
            'success',
            '',
            null,
            $user->name,
            'Password Reset',
            $user->email,
            null,
            'yes',
            $password);

        if($user->save() && $send){
            $message = trans('adminlte_lang::message.msg_add_success_build_user');
            return ['values'=>$user,'message'=>$message,'form'=>'build_user'];
        }

    }

    /**
     * Setup user password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setup_password(\Illuminate\Http\Request $request){
        $user = \Auth::user();
        
        if($request->password != $request->password_confirmation){
            return view('auth.setup_password')->withErrors([
                'password'=>'Password Doesn\'t match'
            ]);
        }else{
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->save();
            return redirect('home');
        }
    }

    /**
     * Setup user password
     * @return \Illuminate\Http\Response
     */
    public function setup_password_skip(){
        $user = \Auth::user();
        $user->status = 1;
        $user->save();
        return redirect('home');
    }


    /**
     * reset a user password for default system password
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset_password($id){
        $user = User::where('id',$id)->first();
        $default = new Defaults();
        $mail = new SendMailController();

        
        if($id == Auth::user()->id){
            $message = trans('adminlte_lang::message.msg_error_own_reset_password_user');
            return ['message'=>$message,'form'=>'reset_password_user','type'=>'error'];
        }else{
            $password = $default->generateRandomString();
            $user->password = bcrypt($password);
            $user->status = 2;
            $send =  $mail->sendMail(
                ['You\'re receive this email with your reset password.'],
                ['This password was generated by our system.'],
                'success',
                null,
                null,
                $user->name,
                'Password Reset',
                $user->email,
                null,
                'yes',
                $password);
            
            if($user->save() && $send){
                $message = trans('adminlte_lang::message.msg_add_success_reset_password_user');
                return ['values'=>$user->name,'message'=>$message,'form'=>'reset_password_user','type'=>'success'];
            }else{
                $message = trans('adminlte_lang::message.msg_error_reset_password_user');
                return ['message'=>$message,'form'=>'reset_password_user','type'=>'error'];
            }
        }
    }


}
