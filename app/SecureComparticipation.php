<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecureComparticipation extends Model
{
    protected $table = 'secure_comparticipation';
    public $timestamps = true;
    protected $fillable = ['code','max_value','deadline','max_frequency','consult_type_id','secure_agency_id','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function consult_type(){
        return $this->belongsTo('App\ConsultType');
    }

    public function secure_agency(){
        return $this->belongsTo('App\SecureAgency');
    }

}
