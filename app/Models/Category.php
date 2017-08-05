<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = true;
    protected $fillable = ['name','salary_base','created_at','updated_at'];

    public function employee(){
        return $this->hasOne('App\Employee');
    }
}
