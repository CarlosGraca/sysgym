<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    //
    //
    protected $table = 'procedure';
    public $timestamps = true;
    protected $fillable = ['code','name','price','status','procedure_group_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function procedure_group(){
        return $this->belongsTo('App\ProcedureGroup');
    }

    public function secure_comparticipation(){
        return $this->hasOne('App\SecureComparticipation');
    }
}
