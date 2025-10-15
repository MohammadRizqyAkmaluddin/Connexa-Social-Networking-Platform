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
        'country',
        'city',
        'headline',
        'email',
        'password',
        'profile_image',
        'cover_image',
    ];

    protected $hidden = [
        'password',
    ];

    public function userEducations()
    {
        return $this->hasMany(UserEducation::class, 'user_id', 'user_id');
    }
    public function languages()
    {
        return $this->hasMany(UserLanguage::class, 'user_id');
    }
    public function skills()
    {
        return $this->hasMany(UserSkill::class, 'user_id');
    }
    public function certificates()
    {
        return $this->hasMany(UserCertificate::class, 'user_id');
    }
    public function experiences()
    {
        return $this->hasMany(UserExperience::class, 'user_id');
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'access_management', 'user_id', 'company_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
    public function sentConnections()
    {
        return $this->hasMany(Connection::class, 'user_id');
    }
    public function receivedConnections()
    {
        return $this->hasMany(Connection::class, 'user_target');
    }
    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function follows()
    {
        return $this->belongsToMany(Company::class, 'follows', 'user_id', 'company_id');
    }
    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'user_id');
    }
    public function access()
    {
        return $this->hasMany(AccessManagement::class, 'company_id');
    }
    public function companyRoles()
    {
        return $this->hasMany(CompanyRole::class, 'user_id');
    }
}
