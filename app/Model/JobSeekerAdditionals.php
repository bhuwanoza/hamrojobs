<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobSeekerAdditionals extends Model
{
    protected $fillable=[
        'job_categories',
        'looking_for',
        'available_for',
        'specialization' ,
        'skills',
        'expected_salary_currency' ,
        'expected_salary_boundary' ,
        'expected_salary' ,
        'expected_salary_basic',
        'current_salary_currency' ,
        'current_salary_boundary',
        'current_salary' ,
        'current_salary_basic' ,
        'job_preference_location' ,
    ];

    public function jobseeker(){
         return $this->belongsTo(JobSeekers::class);
    }

    public function industries(){
        return  $this->belongsToMany(Industries::class);
    }


}
