<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SavedJobs extends Model
{
    protected $fillable=[
        'job_seekers_id',
        'job_posts_id'

    ];

    public function jobs(){
        return $this->belongsTo(JobPosts::class,'job_posts_id');
    }
}
