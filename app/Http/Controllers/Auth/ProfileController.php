<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Defaults;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;

class ProfileController extends Controller
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
        return view('accounts.profile');
    }

    public function update_avatar(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')){

            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($user->avatar != null && $user->avatar != 'img/avatar.png'){
              if(file_exists($user->avatar)){
                unlink($user->avatar);
              }
            }

            Image::make($image->getRealPath())->resize(200, 200)->save($path);


            $user->avatar = 'uploads/'.$filename;
            $user->save();
         }
         return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

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

    public function getPopEdit($name)
    {
      # code...
      $user = Auth::user();
      switch ($name) {
        case 'name':
          return view('layouts.shared.field',['name'=>$name,'label'=>'Name: ','value'=>$user->name,'type'=>'text']);
          break;
        case 'email':
          return view('layouts.shared.field',['name'=>$name,'label'=>'Email: ','value'=>$user->email,'type'=>'email']);
          break;

        default:
          # code...
          break;
      }
    }

    public function updateField(Request $request)
    {
      # code...
      $field = $request->input('field');
      $user = Auth::user();
      switch ($field) {
        case 'name':
          $user->name = $request->input('name');
          $user->save();
          return ['field_value'=>$user->name,'type'=>'success','message'=>'Name updated with success'];
          break;

        case 'email':
          $user->email = $request->input('email');
          $user->save();
          return ['field_value'=>$user->email,'type'=>'success','message'=>'Email updated with success'];
          break;

        default:
            return ['field_value'=>'','type'=>'error','message'=>'#Error: The user '.$field.' cannot saved!'];
          break;
      }
    }

    public function editAccount(){
        $user = \Auth::user();
        return view('accounts.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        //
        $default = new Defaults();
        $user = Auth::user();

        $user->branch_default_id = isset($request->branches) ? $request->branches : 0 ;
        $user->name = $request->name;
        $user->username = $request->username;

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

        if (\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_update_success_user_profile');
            return ['message'=>$message,'form'=>'profile','type'=>'success'];
        }else{
            return view('accounts.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordChange(Request $request){

        $user = \Auth::user();
        $url = url('/logout');

        if (Hash::check($request->old_password, $user->password))
            $user->password = bcrypt($request->new_password);
        else{
            $message = trans('adminlte_lang::message.msg_error_old_password');
            return ['values'=>$user->name,'message'=>$message,'form'=>'password','type'=>'error'];
        }


        if(\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_success_change_user_password');
            $change_password_message = trans('adminlte_lang::message.msg_redirect_to_login');
            return ['message'=>$message,'form'=>'password','type'=>'success','change_password_message' => $change_password_message,'url'=>$url];
        }else{
            return view('accounts.edit');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setting(Request $request){

        $user = \Auth::user();
        $user->action_button = $request->action_button;

        if(\Request::wantsJson() && $user->save()){
            $message = trans('adminlte_lang::message.msg_success_change_user_settings');
            return ['message'=>$message,'form'=>'accounts-setting','type'=>'success'];
        }else{
            return view('accounts.edit');
        }

    }

}
