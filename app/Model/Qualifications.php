<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'status'
    ];
    use Sluggable;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

    public function jobadditional(){
        return $this->belongsTo(JobPostAdditionals::class,'id','education_level');
    }
}
