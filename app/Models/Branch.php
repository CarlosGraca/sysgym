<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    public $timestamps = true;
    protected $fillable = ['name','email','phone','fax','address','manager','city','island_id','user_id','company_id','avatar'];

    public function island(){
        return $this->belongsTo('App\Island');
    }


    public function company(){
        return $this->belongsTo('App\Models\Tenant');
    }

    public function employee(){
        return $this->hasOne('App\Models\Employee');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
