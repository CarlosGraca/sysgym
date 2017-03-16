<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFiles extends Model
{
    //
    protected $table = 'patient_files';
    protected $fillable = ['patient_id','file_id','user_id'];

    public function patient(){
        return $this->hasMany('App\Patient');
    }

    public function file(){
        return $this->belongsTo('App\File');
    }

}
