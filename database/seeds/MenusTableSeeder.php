<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2020-10-24 01:52:44',
                'updated_at' => '2020-10-24 01:52:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'main-nav',
                'created_at' => '2020-11-08 02:14:34',
                'updated_at' => '2020-11-08 02:14:34',
            ),
        ));
        
        
    }
}