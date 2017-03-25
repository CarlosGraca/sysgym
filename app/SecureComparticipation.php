<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecureComparticipation extends Model
{
    protected $table = 'secure_comparticipation';
    public $timestamps = true;
    protected $fillable = ['code','max_value','deadline','max_frequency','procedure_id','secure_agency_id','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function procedure(){
        return $this->belongsTo('App\Procedure');
    }

    public function secure_agency(){
        return $this->belongsTo('App\SecureAgency');
    }

}
