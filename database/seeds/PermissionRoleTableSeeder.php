<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'superadmin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        $role = Role::where('name', 'admin')->firstOrFail();
        $superPermissions = [
                                'browse_bread',
                                'browse_database',
                                'browse_compass',
                            ];
        $permissions = Permission::whereNotIn('key', $superPermissions);

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
