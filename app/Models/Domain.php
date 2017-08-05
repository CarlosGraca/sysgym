<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domain';
	public $timestamps = false;

	//use SoftDeletes;

	protected $fillable = ['dominio', 'codigo', 'significado','tenant_id'];


	 public function membros(){
     	return $this->hasMany('App\Models\Membro');
     }
}
