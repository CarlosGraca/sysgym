<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(MenuTableSeeder::class);
        //$this->call(SystemSeeder::class);
//        $this->call(TimezoneTableSeeder::class);
       
    }
}
