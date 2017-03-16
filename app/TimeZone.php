<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    protected $table = 'timezone';
    protected $fillable = ['name','gmtAdjustment','useDaylightTime','value','user_id'];

    public function system(){
        return $this->hasOne('App\System');
    }

}
