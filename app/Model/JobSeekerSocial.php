<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobSeekerSocial extends Model
{
    protected $fillable = [
        'job_seekers_id',
        'social_account',
        'social_link'
    ];

    public function jobseeker(){
        return $this->belongsTo(JobSeekers::class,'job_seekers_id');
    }
}
