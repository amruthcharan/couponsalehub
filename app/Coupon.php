<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'type',
        'heading_id',
        'title',
        'code',
        'affiliate_url',
        'description',
        'proof_image',
        'expires_at',
        'scheduled_at',
        'is_editor_pick',
        'editor_order',
        'coupon_text',
        'special_message',
        'store_id',
        'h3_id'
    ];

    protected $dates = [
        'scheduled_at', 'expires_at'
    ];

    const TYPES = [
        'DEAL', 'COUPON'
    ];

    public function scopeStore(Builder $builder, $store_id)
    {
        return $builder->whereStoreId($store_id);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where(function ($q) {
            $q->where('scheduled_at', '<=', now())->orWhereNull('scheduled_at');
        })->where(function ($q) {
            $q->where('expires_at', '>', now()->subDays(1))->orWhereNull('expires_at');
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function heading()
    {
        return $this->belongsTo(Heading::class, 'heading_id', 'id');
    }

    public function h3()
    {
        return $this->belongsTo(Heading3::class, 'h3_id', 'id');
    }
}
