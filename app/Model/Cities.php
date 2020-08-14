<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'display',
        'popular',
    ];

}
