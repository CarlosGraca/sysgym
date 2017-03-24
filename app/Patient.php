<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    public $timestamps = true;
    protected $fillable = ['name','phone','mobile','email','genre','birthday','address','bi','island_id','city','profession','work_phone','work_address','nationality','zip_code','facebook','avatar','website','user_id','parents','nif','civil_state','has_secure','secure_card_id'];

    public function island(){
        return $this->belongsTo('App\Island');
    }

    public function secure_card(){
        return $this->belongsTo('App\SecureCard');
    }

    public function patient_file(){
        return $this->belongsTo('App\PatientFiles');
    }
    
    public function consult_agenda(){
        return $this->hasOne('App\ConsultAgenda');
    }
}
