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
        'special_message'
    ];
    const TYPES = [
        'DEAL', 'COUPON'
    ];

    public function scopeStore(Builder $builder, $store_id) {
        return $builder->whereStoreId($store_id);
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
