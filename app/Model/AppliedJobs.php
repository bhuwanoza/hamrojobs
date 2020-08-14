<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppliedJobs extends Model
{
    protected $fillable = [
        'job_id',
        'seeker_id',
        'company_id',
        'expected_salary',
        'cover_letter',
        'ip_address',
    ];

    protected $hidden = [
        'ip_address'
    ];

    public function jobseeker(){
        return $this->belongsTo(JobSeekers::class,'seeker_id');
    }
    public function company(){
       return  $this->belongsTo(Companies::class);
    }
    public function jobs(){
       return $this->belongsTo(JobPosts::class,'job_id');
    }
}
