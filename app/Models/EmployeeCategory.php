<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $table = 'employees_category';
    public $timestamps = true;
    protected $fillable = ['name','salary_base','tenant_id','branch_id','user_id','created_at','updated_at'];

    public function employee(){
        return $this->hasMany('App\Models\Employee','category_id','id');
    }
}
