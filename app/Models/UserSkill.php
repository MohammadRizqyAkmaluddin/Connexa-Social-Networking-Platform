<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = 'user_skill';
    protected $primaryKey = 'skill_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'skill', 'company_id', 'section_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
