<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    public $timestamps = true;
    protected $fillable = ['name','email','phone','fax','logo','nif','zip_code','address','website','owner','area','city','island_id','facebook'];

    public function island(){
        return $this->belongsTo('App\Island');
    }
}
