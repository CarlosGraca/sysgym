<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultType extends Model
{
    protected $table = 'consult_type';
    public $timestamps = true;
    protected $fillable = ['name','price','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function consult_agenda(){
        return $this->hasOne('App\ConsultAgenda');
    }

    
}
