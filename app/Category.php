<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use \TCG\Voyager\Models\Category as VoyagerCategory;

class Category extends VoyagerCategory
{
    public function scopeHomepage (Builder $builder) {
        return $builder->whereHomepage(true)->get();
    }
}
