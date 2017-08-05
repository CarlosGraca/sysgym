<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculation extends Model
{
    //
    protected $table = 'matriculation';
    public $timestamps = true;
    protected $fillable = ['note','tenant_id','modality_id','status','client_id','user_id','branch_id'];

    public function modality(){
        return $this->belongsTo('App\Modality');
    }

    public function matriculation(){
        return $this->belongsTo('App\Matriculation');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
