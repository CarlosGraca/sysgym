<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantMenu extends Model
{
    protected $table = 'tenant_menu';

    protected $fillable = array('menu_id', 'tenant_id');

    public function menus(){
    	return $this->belongsTo('App\Models\Menu','menu_id','id');
    }

    public function permissions(){
    	return $this->belongsTo('App\Models\permission','id','tenant_menu_id');
    }


}
