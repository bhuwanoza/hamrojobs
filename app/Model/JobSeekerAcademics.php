<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobSeekerAcademics extends Model
{
    protected $fillable=[
        'job_seekers_id',
        'academic_degree',
        'academic_program',
        'academic_board',
        'academic_institute',
        'start_date',
        'end_date',
        'grade_type',
        'mark_secured'
    ];

    public function jobseeker(){
        return $this->belongsTo(JobSeekers::class,'job_seekers_id');
    }
     public function qualification(){
        return $this->belongsTo(Qualifications::class,'academic_degree');
     }
}
