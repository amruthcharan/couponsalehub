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

    public function getCouponsCountAttribute() {
        return 10;
    }
}
