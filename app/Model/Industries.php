<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class   Industries extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'status',
        'top'
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


    public function jobseekeradditional(){
        return $this->belongsToMany(JobSeekerAdditionals::class);
    }

    public function jobs(){
        return $this->hasMany(JobPosts::class,'industry_id');
    }

}
