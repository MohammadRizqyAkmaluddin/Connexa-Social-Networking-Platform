<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $table = 'user_language';
    public $timestamps = false;

    protected $fillable = ['user_id', 'language', 'proficiency_id', 'section_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function proficiency()
    {
        return $this->belongsTo(Proficiency::class, 'proficiency_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
