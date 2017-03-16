<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecureAgency extends Model
{
    protected $table = 'secure_agency';
    public $timestamps = true;
    protected $fillable = ['name','email','phone','fax','address','website','city','island_id','zip_code','user_id','avatar','nif'];

    public function island(){
        return $this->belongsTo('App\Island');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function secure_comparticipation(){
        return $this->hasOne('App\SecureComparticipation');
    }

    public function secure_card(){
        return $this->hasOne('App\SecureCard');
    }
}
