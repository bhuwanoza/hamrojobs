<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use Sluggable;

    protected $fillable = [
        'title' ,
        'slug' ,
        'content',
        'status',
        'tag',
        'image' ,

    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }


    public function comments(){
        return $this->hasMany(BlogPostComment::class);
    }
}
