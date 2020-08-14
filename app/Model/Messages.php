<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected  $fillable=[
        'first_name',
        'last_name',
        'email',
        'subject',
        'mobile',
        'message',
        'status',
    ];
}
