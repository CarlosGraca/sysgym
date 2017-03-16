<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'system';
    public $timestamps = true;
    protected $fillable = ['name','theme','lang','currency','layout','background_image'];

    public function timezone(){
        return $this->belongsTo('App\TimeZone');
    }
}
