<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcedureGroup extends Model
{
    //
    protected $table = 'procedure_group';
    public $timestamps = true;
    protected $fillable = ['code','name','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
