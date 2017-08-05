<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = ['name','phone','mobile','email','genre','birthday','address','bi','island_id','city','profession','work_phone','work_address','nationality','zip_code','facebook','avatar','website','user_id','parents','nif','civil_state'];

    public function island(){
        return $this->belongsTo('App\Island');
    }

    public function secure_card(){
        return $this->belongsTo('App\SecureCard');
    }
    
    public function payment(){
        return $this->hasMany('App\Payment');
    }

    public function matriculation(){
        return $this->hasMany('App\Matriculation');
    }

    public function matriculation_modality(){
        return $this->hasMany('App\MatriculationModality');
    }

}
