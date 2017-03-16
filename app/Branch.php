<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    public $timestamps = true;
    protected $fillable = ['name','email','phone','fax','address','manager','city','island_id','user_id','company_id'];

    public function island(){
        return $this->belongsTo('App\Island');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function employee(){
        return $this->hasOne('App\Employee');
    }
}
