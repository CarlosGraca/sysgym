<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'files';
    protected $fillable = ['name','name_original','full_path','mime_type','media_type'];

    public function patient_files(){
        return $this->hasMany('App\PatientFiles');
    }
}
