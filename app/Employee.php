<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = ['name','phone','mobile','email','genre','birthday','address','bi','island_id','city','category_id','salary','note','nationality','zip_code','facebook','avatar','website','user_id','parents','nif','civil_state','start_work','end_work','branch_id','doctor','has_secure'];

    public function island(){
        return $this->belongsTo('App\Island');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function secure_card(){
        return $this->belongsTo('App\SecureCard');
    }
}
