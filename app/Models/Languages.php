<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table = 'languages';
    public $timestamps = false;

    public function userLanguages()
    {
        return $this->hasMany(UserLanguage::class, 'language_id', 'language_id');
    }
}
