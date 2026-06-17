<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    
    protected $fillable =[
        'title',
        'name',
        'role',
        'email',
        'otp',
        'otp_expiry',
        'phone',
        'password',
        'course',
        'gender',
        'date_of_birth',
        'address',
    ];

    

}
