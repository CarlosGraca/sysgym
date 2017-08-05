<?php

namespace App\Models;

use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;


class Menu extends Model
{
    protected $items;
    protected $current;
    protected $currentKey;

    protected $table = 'menus';

    protected $fillable = ['parent_id','title','url','menu_order','status','level','icon','description'];

    

    public  static function getMenus() {

        //$menus = Menu::where('parent_id',0)->where('status',1)->orderby('menu_order')->get();

        $menus = DB::table('menus')
            ->join('tenant_menu', 'menus.id', '=', 'tenant_menu.menu_id')
            ->join('permissions', 'tenant_menu.id','permissions.tenant_menu_id')
            ->where('tenant_id',Auth::user()->tenant_id)
            ->where('status',1)
            ->where('parent_id',0)
            ->where('permissions.role_id',Auth::user()->role_id)
            ->select('menus.*')
            ->orderby('menu_order')
            ->get();
            
        return $menus;
    }

    public  static function getMenuItem($memu) {

        //$menus = Menu::where('parent_id',$memu)->where('status',1)->orderby('menu_order')->get();
        $menus = DB::table('menus')
            ->join('tenant_menu', 'menus.id', '=', 'tenant_menu.menu_id')
            ->join('permissions', 'tenant_menu.id','permissions.tenant_menu_id')
            ->where('tenant_id',Auth::user()->tenant_id)
            ->where('status',1)
            ->where('parent_id',$memu)
            ->where('permissions.role_id',Auth::user()->role_id)
            ->select('menus.*')
            ->orderby('menu_order')
            ->get();
            
        return $menus;
    }

}
