<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultAgenda extends Model
{
    protected $table = 'consult_agenda';
    public $timestamps = true;
    protected $fillable = ['note','date','start_time','end_time','consult_type_id','doctor_id','patient_id','branch_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function doctor(){
        return $this->belongsTo('App\Employee');
    }

    public function consult_type(){
        return $this->belongsTo('App\ConsultType');
    }

}
