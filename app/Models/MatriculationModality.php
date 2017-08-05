<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriculationModality extends Model
{
    protected $table = 'matriculation_modality';
    public $timestamps = true;
    protected $fillable = ['price','total','status','modality_id','user_id','matriculation_id','client_id'];

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
