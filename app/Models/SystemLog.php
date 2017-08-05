<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $table = 'system_log';
    public $timestamps = true;
    protected $fillable = ['activity','date','time','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
