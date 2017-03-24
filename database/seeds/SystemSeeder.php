<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\System;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        System::create(
            [
                'name'      => 'OdontSoft',
                'theme'     => 'skin-blue',
                'lang'      => 'en',
                'currency'  => 'CVE',
                'layout'    => 'fixed',
                'status'    => '2',
                'timezone'  => 'Atlantic/Cape_Verde',
            ]);
    }
}
