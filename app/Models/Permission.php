<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['tenant_menu_id', 'role_id', 'active', 'type'];

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }

    public function tenant_menu(){
        return $this->belongsTo('App\Models\TenantMenu');
    }
}
