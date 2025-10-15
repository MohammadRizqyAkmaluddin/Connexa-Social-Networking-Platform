<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $primaryKey = 'section_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['section_id', 'type'];

    public function abouts()
    {
        return $this->hasMany(About::class, 'section_id');
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class, 'section_id');
    }

    public function certificates()
    {
        return $this->hasMany(UserCertificate::class, 'section_id');
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'section_id');
    }

    public function experiences()
    {
        return $this->hasMany(UserExperience::class, 'section_id');
    }

    public function languages()
    {
        return $this->hasMany(UserLanguage::class, 'section_id');
    }
}
