<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
class Employers extends Model
{

    protected $fillable = [
        'user_id',
        'top_employer',
        'status',
        'image',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function company(){
        return $this->hasOne(Companies::class,'employers_id');
    }

    public function jobposts(){
        return $this->hasMany(JobPosts::class,'employer_id');
    }
}
