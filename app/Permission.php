<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use \TCG\Voyager\Models\Permission as VoyagerPermission;

class Permission extends VoyagerPermission
{
    public function scopeAvailable (Builder $builder) {
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
        return $builder->whereNotIn('key',$superPermissions);
    }
}
