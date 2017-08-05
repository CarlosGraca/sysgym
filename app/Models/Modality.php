<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    protected $table = 'modalities';
    public $timestamps = true;
    protected $fillable = ['name','price','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function matriculation_modality(){
        return $this->hasMany('App\MatriculationModality');
    }
}
