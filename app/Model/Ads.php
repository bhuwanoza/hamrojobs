<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'title',
        'link',
        'status',
        'position',
        'expires_on',
        'image',
        'user_id'
    ];
}
