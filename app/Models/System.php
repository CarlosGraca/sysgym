<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'system';
    public $timestamps = true;
    protected $fillable = ['name','theme','lang','currency','layout','background_image','timezone'];
}
