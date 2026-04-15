<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitlistSignup extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'source',
        'ip_address',
        'user_agent',
    ];
}
