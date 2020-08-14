<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class JobSeekers extends Model
{

    protected $fillable = [
        'user_id',
        'top_employer',
        'status',
        'image',
        'gender',
        'dob',
        'marital_status',
        'religion',
        'nationality',
        'mobile',
        'current_address',
        'permanent_address',
        'about_me'
    ];


    public function additional(){
        return $this->hasOne(JobSeekerAdditionals::class);
    }
    public function academics(){
        return $this->hasMany(JobSeekerAcademics::class);
    }

    public function experiences(){
        return $this->hasMany(JobSeekerExperiences::class);
    }

    public function skills(){
        return $this->belongsToMany(Skills::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function social(){
         return $this->hasMany(JobSeekerSocial::class);
    }

    public function appliedjob(){
        return $this->hasMany(AppliedJobs::class);

    }


}
