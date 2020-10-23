<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    use Seedable;

    protected $seedersPath = __DIR__.'/';
    public function run()
    {
        $this->call([VoyagerDatabaseSeeder::class, VoyagerDummyDatabaseSeeder::class]);
    }
}
