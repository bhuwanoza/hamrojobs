<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'user_id',
        'image',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
