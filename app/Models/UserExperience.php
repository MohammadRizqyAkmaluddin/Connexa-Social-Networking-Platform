<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $fillable = [
        'user_id', 'company_id', 'title', 'position',
        'employment_id', 'mode_id', 'start_date', 'end_date', 'section_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'employment_id');
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class, 'mode_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
