<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//delete users table records
        DB::table('menus')->delete();
        //insert some dummy records
       
		Menu::create(['parent_id'=>0,'title'=>'Home','url'=>'home','menu_order'=>'1','status'=>'1','level'=>null,'icon'=>'fa fa-home','description'=>null]); 

        Menu::create(['parent_id'=>0,'title'=>'Dashboard','url'=>'dashboard','menu_order'=>'2','status'=>'1','level'=>null,'icon'=>'fa fa-dashboard','description'=>null]); 

        Menu::create(['parent_id'=>0,'title'=>'Gestão de Clientes','url'=>'clients','menu_order'=>'3','status'=>'1','level'=>null,'icon'=>'fa fa-users','description'=>null]); 

        Menu::create(['parent_id'=>0,'title'=>'Gestão de Cobrança','url'=>'cobrancas','menu_order'=>'4','status'=>'1','level'=>null,'icon'=>'fa fa-money','description'=>null]); 

		Menu::create(['id'=>11,'parent_id'=>0,'title'=>'Configurações','url'=>'#','menu_order'=>7,'status'=>'1','level'=>null,'icon'=>'fa fa-gear','description'=>null]);		
		
		Menu::create(['id'=>17,'parent_id'=>11,'title'=>'Gestão de Utilizadores','url'=>'users','menu_order'=>'1','status'=>'1','level'=>null,'icon'=>null,'description'=>null]); 

		Menu::create(['id'=>18,'parent_id'=>11,'title'=>'Gestão de Menu','url'=>'menus','menu_order'=>'2','status'=>'1','level'=>null,'icon'=>null,'description'=>null]); 

		Menu::create(['id'=>19,'parent_id'=>11,'title'=>'Gestão de Dominios','url'=>'dominios','menu_order'=>'5','status'=>'1','level'=>null,'icon'=>null,'description'=>null]); 

		Menu::create(['id'=>20,'parent_id'=>11,'title'=>'Gestão de Perfil','url'=>'roles','menu_order'=>'3','status'=>'1','level'=>null,'icon'=>null,'description'=>null]);

		Menu::create(['id'=>21,'parent_id'=>11,'title'=>'Empresa','url'=>'settings','menu_order'=>0,'status'=>'1','level'=>null,'icon'=>null,'description'=>null]); 

		Menu::create(['id'=>22,'parent_id'=>11,'title'=>'Gestão de Permissão','url'=>'permissions','menu_order'=>'4','status'=>'1','level'=>null,'icon'=>null,'description'=>null]);

    }
}
