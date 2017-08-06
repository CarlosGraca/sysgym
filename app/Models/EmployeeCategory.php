<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $table = 'employees_category';
    public $timestamps = true;
    protected $fillable = ['name','salary_base','created_at','updated_at'];

    public function employee(){
        return $this->hasOne('App\Models\Employee');
    }
}
