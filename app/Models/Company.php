<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'company_id', 'company_id');
    }
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class, 'parent_id');
    }
    public function childCompanies()
    {
        return $this->belongsToMany(Company::class, 'subsidiary', 'parent_id', 'company_id');
    }
    public function parentCompany()
    {
        return $this->belongsToMany(Company::class, 'subsidiary', 'company_id', 'parent_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'access_management', 'company_id', 'user_id');
    }
    public function roles()
    {
        return $this->hasMany(CompanyRole::class, 'company_id');
    }
    public function majors()
    {
        return $this->hasMany(Major::class, 'company_id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'company_id', 'user_id');
    }
}
