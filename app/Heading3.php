<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading3 extends Model
{
    protected $table = 'headings3';

    protected $fillable = [
        'id',
        'heading_id',
        'title',
        'store_id',
        'order',
        'description'
    ];

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'h3_id', 'id');
    }

    public function heading()
    {
        return $this->belongsTo(Heading::class, 'heading_id', 'id');
    }
}
