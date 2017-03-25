<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teeth extends Model
{
    //
    protected $table = 'teeth';
    public $timestamps = true;
    protected $fillable = ['number','name','avatar','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
