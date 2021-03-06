<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table='contact_uses';

    protected $fillable=[
        'first_name',
        'last_name',
        'subject',
        'email',
        'mobile',
        'message',
        'status',
    ];
}
