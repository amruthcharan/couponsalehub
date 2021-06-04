<?php

use App\Category;
use App\Coupon;
use App\Heading;
use App\Store;
use Illuminate\Database\Seeder;

class StoreDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production' && Store::count() == 0) {
            $categories = Category::take(3)->get();
            foreach ($categories as $category) {
                factory(Store::class, 5)
                    ->create(['category_id' => $category->id])
                    ->each(function ($store){
                        factory(Heading::class, 3)
                            ->create(['store_id' => $store->id])
                            ->each(function ($heading) use($store) {
                                factory(Coupon::class, 1)
                                    ->create(['heading_id' => $heading->id, 'store_id' => $store->id]);
                            });
                        factory(Coupon::class, 4)
                            ->create(['is_editor_pick' => true, 'store_id' => $store->id]);
                        factory(Coupon::class, 2)
                            ->create(['is_editor_pick' => false, 'store_id' => $store->id]);
                    });
            }
        }
    }
}
