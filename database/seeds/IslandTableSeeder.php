<?php

use Illuminate\Database\Seeder;
use App\Island;
use Illuminate\Database\Eloquent\Model;

class IslandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Island::create(['name' => 'Santo Antão']);
        Island::create(['name' => 'São Vicente']);
        Island::create(['name' => 'Santa Luzia']);
        Island::create(['name' => 'São Nicolau']);
        Island::create(['name' => 'Sal']);
        Island::create(['name' => 'Boa Vista']);
        Island::create(['name' => 'Maio']);
        Island::create(['name' => 'Santiago']);
        Island::create(['name' => 'Fogo']);
        Island::create(['name' => 'Brava']);
    }
}
