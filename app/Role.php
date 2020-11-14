<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use \TCG\Voyager\Models\Role as VoyagerRole;

class Role extends VoyagerRole
{
    public function scopeAvailable (Builder $builder) {
        return $builder->where('name','<>','superadmin');
    }
}
