<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    // Fields that can be mass-assigned
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    // Hidden fields when serialized to JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
