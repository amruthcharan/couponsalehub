<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    protected $fillable = ['title', 'description', 'order', 'store_id'];
}
