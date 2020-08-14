<?php

namespace App;

use App\Model\Admin;
use App\Model\Companies;
use App\Model\Employers;
use App\Model\JobSeekerExperiences;
use App\Model\JobPosts;
use App\Model\JobSeekerAcademics;
use App\Model\JobSeekers;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Cartalyst\Sentinel\Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Notifications\Notifiable;

class User extends EloquentUser
{
    use Notifiable;

    protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'address',
        'mobile',
        'provider',
        'provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function authUser(){
        return  \Sentinel::getUser();
    }

    public static function byEmail($email){
        return static::whereEmail($email)->first();
    }
    public static function findRoleBySlug($slug){
        return User::where('slug',$slug)->get();
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }
    public function employer(){
        return $this->hasOne(Employers::class);
    }
    public function jobseeker(){
        return $this->hasOne(JobSeekers::class);
    }

    public function company(){
        return $this->hasOne(Companies::class);
    }


}
