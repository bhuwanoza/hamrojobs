<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable=[
        'title'
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

    public function jobseekers(){
        return $this->belongsToMany(JobSeekers::class,'job_seekers');
    }

    public function jobposts(){
        return $this->belongsToMany(JobPosts::class);
    }

}
