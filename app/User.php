<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','branch_id','status','employee_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function branch(){
//        return $this->hasOne('App\Branch');
//    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

     public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }

    public function branch_default(){
        return $this->belongsTo('App\Models\Branch','branch_default_id','id');
    }

   /* public function hasRole($role){
        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function assign($role){
        if(is_string($role)){
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }
        
        return $this->roles()->save($role);
    }

    public function detatch(Role $role){
        return $this->roles()->detach($role);
    }*/
    
}
