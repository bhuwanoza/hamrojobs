<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{

    protected $fillable = [
        'title' ,
        'service_type',
        'number_of_vacancies' ,
        'job_type',
        'job_level',
        'salary_type' ,
        'min_salary',
        'max_salary' ,
        'job_deadline' ,
        'status' ,
        'location' ,
        'count' ,
        'ip_address',
        'job_banner' ,
        'employer_id',
        'company_id' ,
        'industry_id',
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
        return $this->hasOne(JobPostAdditionals::class,'job_id');
    }

    public function industry(){
        return $this->belongsTo(Industries::class);
    }

    public function company(){
        return $this->belongsTo(Companies::class);
    }

    public function skills(){
        return $this->belongsToMany(Skills::class);
    }

    public function savedjob(){
        return $this->hasMany(SavedJobs::class);
    }

    public function applications(){
        return $this->hasMany(AppliedJobs::class,'job_id');
    }


}
