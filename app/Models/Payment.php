<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = ['note','payment_method','total','status','value_pay','user_id','matriculation_id','branch_id'];
    
    public function matriculation(){
        return $this->belongsTo('App\Matriculation');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
    
}
