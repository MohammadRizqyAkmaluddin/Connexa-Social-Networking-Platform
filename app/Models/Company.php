<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_id',
        'page_id',
        'name',
        'industry',
        'tagline',
        'established_date',
        'country',
        'city',
        'logo',
        'cover_image'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'company_id', 'company_id');
    }
    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'company_id', 'company_id');
    }
    public function experiences()
    {
        return $this->hasMany(UserExperience::class, 'company_id', 'company_id');
    }
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class, 'parent_id', 'company_id');
    }
    public function parentRelation()
    {
        return $this->hasOne(Subsidiary::class, 'company_id', 'company_id');
    }
    public function childCompany()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
    public function parentCompany()
    {
        return $this->belongsTo(Company::class, 'parent_id', 'company_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'access_management', 'company_id', 'user_id');
    }
    public function roles()
    {
        return $this->hasMany(CompanyRole::class, 'company_id', 'company_id');
    }
    public function majors()
    {
        return $this->hasMany(Major::class, 'company_id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id', 'company_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'company_id', 'user_id');
    }
    public function follows()
    {
        return $this->hasMany(Follow::class, 'company_id', 'company_id');
    }
    public function overviews()
    {
        return $this->hasOne(Overview::class, 'company_id', 'company_id');
    }
}
