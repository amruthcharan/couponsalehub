<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    protected $fillable = ['title', 'description', 'order', 'store_id'];

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'heading_id', 'id');
    }

    public function h3s()
    {
        return $this->hasMany(Heading3::class, 'heading_id', 'id');
    }
}
