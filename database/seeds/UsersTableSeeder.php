<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'superadmin')->firstOrFail();

            User::create([
                'name'           => 'Amruth Charan',
                'email'          => 'charan@redarrow.com',
                'password'       => bcrypt('Newyear@19'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => env('ADMIN_EMAIL','admin@nextgen.com'),
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
                'bio'            => 'OffersnReviews is one amongst the best online coupons and reviews website. We provide great deals for about 10,000 stores with working coupons and update them daily.'
            ]);
        }
    }
}
