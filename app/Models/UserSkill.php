<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = 'user_skills';
    protected $primaryKey = 'skill_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'education_id', 'experience_id', 'skill'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function education()
    {
        return $this->belongsTo(UserEducation::class, 'education_id', 'education_id');
    }
    public function experience()
    {
        return $this->belongsTo(UserExperience::class, 'experience_id', 'experience_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
