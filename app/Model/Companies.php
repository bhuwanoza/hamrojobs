<?php

namespace App\Model;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use Sluggable;

    protected $fillable = [
        'industry_id' ,
        'employers_id',
        'title',
        'address' ,
        'email',
        'phone' ,
        'website',
        'fax',
        'total_employees' ,
        'branches',
        'established_date' ,
        'ownership' ,
        'description' ,
        'top_company',
        'seo',
        'logo',
        'cover_image'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

    public  function jobposts(){
        return $this->hasMany(JobPosts::class,'company_id');
    }

    public function employer(){
        return $this->belongsTo(Employers::class);
    }

    public function industry(){
        return $this->belongsTo(Industries::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
