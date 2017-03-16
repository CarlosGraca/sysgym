<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedules';
    protected $fillable = ['week_day','start_time','end_time','status','branch_id','user_id'];

    public function users(){
        return $this->hasOne('App\User');
    }

    public function branches(){
        return $this->hasOne('App\Branch');
    }
}
