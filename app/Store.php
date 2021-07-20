<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Store extends Model
{
    use Resizable;

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
        'logo',
        'is_enabled',
        'popular_store',
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

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'store_id', 'id');
    }

    public function getCouponsCountAttribute() {
        return $this->coupons()->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('is_enabled', true);
    }
}
