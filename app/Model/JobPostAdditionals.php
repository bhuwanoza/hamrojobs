<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobPostAdditionals extends Model
{

    protected $fillable = [
        'job_id',
        'education_level',
        'required_education',
        'experience',
        'experience_boundary',
        'experience_measure',
        'age_specific',
        'age_specific_boundary',
        'gender_specific',
        'specification',
        'description'

    ];



     public  function jobpost(){
         return $this->belongsTo(JobPosts::class);
     }

     public function qualification(){
         return $this->hasOne(Qualifications::class,'id','education_level');
     }
}
