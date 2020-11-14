<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Reviews',
                'slug' => 'reviews',
                'created_at' => '2020-10-24 01:52:44',
                'updated_at' => '2020-11-14 12:01:02',
                'meta_description' => 'category_description',
                'meta_title' => 'test message should handle max length of 60 characters.',
            ),
            1 =>
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Offers',
                'slug' => 'offers',
                'created_at' => '2020-10-24 01:52:44',
                'updated_at' => '2020-10-25 08:51:25',
                'meta_description' => 'category_description',
                'meta_title' => 'offers',
            ),
        ));


    }
}
