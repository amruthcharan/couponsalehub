<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDummyDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedersPath = database_path('seeds').'/';
        $this->seed('CategoriesTableSeeder');
        $this->seed('UsersTableSeeder');
        $this->seed('PostsTableSeeder');
        $this->seed('PagesTableSeeder');
        $this->seed('StoresTableSeeder');
        $this->seed('HeadingsTableSeeder');
        $this->seed('FaqsTableSeeder');
        $this->seed('SlidesTableSeeder');
        $this->seed('CouponsTableSeeder');
        // $this->seed('StoreDataSeeder');
        $this->seed('RedirectsTableSeeder');
        $this->seed('TranslationsTableSeeder');
        $this->seed('PermissionRoleTableSeeder');
    }
}
