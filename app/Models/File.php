<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'files';
    protected $fillable = ['name','name_original','full_path','mime_type','media_type'];

//    public function client_files(){
//        return $this->hasMany('App\ClientFiles');
//    }
}
