<?php

namespace App\Models;

use Doctrine\Inflector\Language;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $table = 'user_languages';
    public $timestamps = false;

    protected $fillable = ['user_id', 'language_id', 'proficiency_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function proficiency()
    {
        return $this->belongsTo(Proficiency::class, 'proficiency_id');
    }
    public function language()
    {
        return $this->belongsTo(Languages::class, 'language_id', 'language_id');
    }

}
