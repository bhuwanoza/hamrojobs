<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobSeekerExperiences extends Model
{
    protected  $fillable=[
        'job_seekers_id',
        'organization_title',
        'hide_organization',
        'organization_nature',
        'job_location',
        'job_title',
        'job_industry',
        'job_level',
        'start_date',
        'end_date',
        'organization',
        'duties_responsibilities'

    ];

    public function jobseeker(){
        return $this->belongsTo(JobSeekers::class,'job_seekers_id');
    }

    public function industry(){
        return $this->belongsTo(Industries::class,'job_industry');
    }
}
