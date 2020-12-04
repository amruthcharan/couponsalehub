<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'custom_keyword',
        'website_url',
        'affiliate_url',
        'first_paragraph',
        'category_id',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'logo'
    ];

    protected $appends = ['coupons_count'];

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'store_id', 'id');
    }

    public function headings()
    {
        return $this->hasMany(Heading::class, 'store_id', 'id');
    }

    public function getCouponsCountAttribute() {
        return $this->coupons()->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
