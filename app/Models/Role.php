<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class Role extends Model{

    protected $table = 'roles';
    protected $fillable = [
    'name',
    'display_name',
    'description',
    'status',
    ];

    protected $rules = [
    'name'      => 'required|unique:roles',
    'display_name'      => 'required|unique:roles',
    ];

}
