<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'gender',
        'dob',
        'headline',
        'email',
        'password',
        'profile_image',
        'cover_image',
    ];

    protected $hidden = [
        'password',
    ];
}
