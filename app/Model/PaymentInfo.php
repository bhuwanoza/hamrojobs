<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['bank_title']
            ]
        ];
    }

    protected $fillable = [
        'bank_title',
        'account_name',
        'account_number',
        'account_type',
        'status',
        'image',
        'slug'
    ];
}
