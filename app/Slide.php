<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['id', 'image', 'order', 'is_enabled', 'link'];

    public function scopePublished(Builder $builder)
    {
        return $builder->where('is_enabled', true);
    }
}
