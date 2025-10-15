<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    protected $table = 'proficiencies';
    protected $primaryKey = 'proficiency_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['proficiency_id', 'proficiency'];

    public function userLanguages()
    {
        return $this->hasMany(UserLanguage::class, 'proficiency_id');
    }
}
