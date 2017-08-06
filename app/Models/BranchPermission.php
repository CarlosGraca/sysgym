<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchPermission extends Model
{
    //
    protected $table = 'branch_permission';
    public $timestamps = true;
    protected $fillable = ['user_id','company_id','branch_id'];

    public function tenant(){
        return $this->belongsTo('App\Models\Tenant','company_id','id');
    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
