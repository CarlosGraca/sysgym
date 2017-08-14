<?php

namespace App\Http\Controllers\Auth;

use App\Models\Branch;
use App\Models\System;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Tenant;
use App\Models\Role;
use Illuminate\Http\Request;
use Mail;
use DB;
use App\Models\Menu;
use App\Models\TenantMenu;
use App\Models\Permission;
use Auth;
/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function redirectRegisterTenants(){
        return view('auth.tenant');
    }

    public function registerTenants(Request $request){

        /*DB::beginTransaction();
        try{*/
            $input = $request->all();
            $validator = $this->validator($input);

            if($validator->passes()){
                $tenant = Tenant::create($input);
                $role = new Role();
                $role->name = 'admin';
                $role->display_name = 'Administrador';
                $role->description = 'Administrador';
                $role->tenant_id =  $tenant->id;
                $role->save();

                $data = $this->create($input)->toArray();
                $data['tenant_id'] = $tenant->id;
                $data['role_id'] = $role->id;
                $data['token'] = str_random(25);



                $user = User::find($data['id']);
                $user->tenant_id = $data['tenant_id'];
                $user->role_id   = $data['role_id'];
                $user->token     = $data['token'];
                $user->save();

                //CREATE BRANCH
                $branch = new Branch();
                $branch->name = $tenant->subdomain_name;
//                $branch->email = $tenant->email;
                $branch->address = $tenant->address_1;
                $branch->phone = $tenant->phone;
                $branch->fax = $tenant->fax;
//                $branch->manager = $tenant->manager;
                $branch->city = $tenant->city;
                $branch->tenant_id = $tenant->id;
                $branch->user_id = $user->id;
                $branch->save();

                //CREATE SYSTEM CONFIG
                $system = new System();
                $system->name = config('app.name');
                $system->theme = config('app.theme');
                $system->lang = config('app.locale');
                $system->layout = config('app.layout');
                $system->currency = config('app.currency');
                $system->background_image = config('app.background');
                $system->timezone = config('app.timezone');
                $system->branch_id = $branch->id;
                $system->tenant_id = $user->tenant_id;
                $system->save();

                Mail::send('auth.mails.confirmation', $data, function($message) use($data) {
                     $message->to($data['email']);
                     $message->subject('Registration Confirmation');
                });

                return redirect(route('login'))->with('status', 'Confirmation email has been send. please check your email.');
            }
           /* DB::commit();
        }catch(\Exception $e){
            DB::rollBack();           
            return redirect('auth/register')->with('warning', $e);
        }*/
         return redirect('auth/register')->withErrors($validator->errors());
        
    }

    public function saveMenu($user){        

        $menus = Menu::where('status',1)->where('defualt_menu',1)->get();
        foreach ($menus  as $key => $menu) {
            $tenant_menu = new TenantMenu();
            $tenant_menu->menu_id = $menu->id;
            $tenant_menu->tenant_id = $user->tenant_id;
            $tenant_menu->save();
        }
    }


    public function savePermissions($user){        

        $tenant_menus = TenantMenu::where('tenant_id',$user->tenant_id)->get();
        foreach ($tenant_menus  as $key => $tenant_menu) {
            $permision = new Permission();
            $permision->type ='MENU';
            $permision->tenant_menu_id = $tenant_menu->id;
            $permision->role_id = $user->role_id;
            $permision->active  =1;
            $permision->save();
        }
    }


    public function confirmation($token){
         $user = user::where('token',$token)->first();
         $tenant = Tenant::where('id',$user->tenant_id)->first();
         if(!is_null($user) && !is_null($tenant)){
            $user->status = 1;
            $tenant->active = 1;
            $user->token = '';
            $user->save();
            $tenant->save();

            $this->saveMenu($user);
            $this->savePermissions($user);

            return redirect(route('login'))->with('status', 'Your activation is completed.');
         }
         return redirect(route('login'))->with('warning', 'Something went wrong');
    }

   
}
