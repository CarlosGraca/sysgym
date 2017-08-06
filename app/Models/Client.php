<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = ['name','phone','mobile','email','genre','birthday','address','bi','city','profession','work_phone','work_address','nationality','zip_code','facebook','avatar','website','user_id','parents','nif','civil_state'];

    public function payment(){
        return $this->hasMany('App\Models\Payment');
    }

    public function matriculation(){
        return $this->hasMany('App\Models\Matriculation');
    }

}
