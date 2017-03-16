<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecureCard extends Model
{
    protected $table = 'secure_card';
    public $timestamps = true;
    protected $fillable = ['start_date','end_date','note','secure_number','secure_agency_id'];

    public function employee(){
        return $this->hasOne('App\Employee');
    }

    public function patient(){
        return $this->hasOne('App\Patient');
    }

    public function secure_agency(){
        return $this->belongsTo('App\SecureAgency');
    }
}
