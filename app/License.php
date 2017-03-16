<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    //
    protected $table = 'license';
    protected $fillable = ['product_key','license_to','deadline','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
