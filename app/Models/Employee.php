<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = ['name','phone','mobile','email','genre','birthday','address','bi','city','category_id','salary','note','nationality','zip_code','facebook','avatar','website','user_id','parents','nif','civil_state','start_work','end_work','branch_id'];

    public function employee_category(){
        return $this->belongsTo('App\Models\EmployeeCategory');
    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

}
