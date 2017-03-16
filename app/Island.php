<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $table = 'islands';
    protected $fillable = ['name'];

    public function company(){
        return $this->hasOne('App\Company');
    }

    public function patient(){
        return $this->hasOne('App\Patient');
    }

    public function employee(){
        return $this->hasOne('App\Employee');
    }
    
    public function secure_agency(){
        return $this->hasOne('App\SecureAgency');
    }
    
}
