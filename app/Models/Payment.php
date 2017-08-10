<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = ['note','payment_method','value_pay','status','value_pay','user_id','branch_id','client_id','free','discount','start_date','end_date','tenant_id','item_id','item_type','month_id','type'];
    
    public function matriculation(){
        return $this->belongsTo('App\Models\Matriculation');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }
    
}
