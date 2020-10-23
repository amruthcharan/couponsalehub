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
                                'browse_menus',
                                'read_menus',
                                'edit_menus',
                                'add_menus',
                                'delete_menus',
                                'browse_settings',
                                'read_settings',
                                'edit_settings',
                                'add_settings',
                                'delete_settings'
                            ];
        $permissions = Permission::whereNotIn('key', $superPermissions);

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
